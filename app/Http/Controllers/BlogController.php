<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\MetaTag;
use App\Models\BlogTag;

class BlogController extends Controller
{
    public function blogs( Request $request ) {
        $pinned = Blog::where( 'is_pinned', true )
        ->orderByDesc( 'published_at' )
        ->first();

        // Fallback to latest published blog if no pinned one
        if ( !$pinned ) {
            $pinned = Blog::orderByDesc( 'published_at' )
            ->first();
        }

        // Manually load recommended posts
        $pinned?->setRelation( 'recommended_posts', $pinned->recommended_posts );

        // Exclude pinned from the list
        $blogs = Blog::when( $pinned, fn ( $query ) => $query->where( 'id', '!=', $pinned->id ) )
        ->orderBy( 'published_at', 'desc' )
        ->get();

        // Manually load recommended posts for each blog
        $blogs->each ( fn ( $blog ) => $blog->setRelation( 'recommended_posts', $blog->recommended_posts ) );

        return response()->json( [
            'meta_tags' => MetaTag::where('slug', 'blogs')->first(),
            'pinned' => $pinned,
            'blogs' => $blogs,
            'tags' => BlogTag::all(),
        ] );
    }

     public function show( $slug ) {
        $blog = Blog::where( 'slug', $slug )->firstOrFail();
        $blog->setRelation( 'recommended_posts', $blog->recommended_posts );
        $blog->setRelation( 'tags', $blog->tags );

        return response()->json( $blog );
    }
}
