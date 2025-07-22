<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'content',
        'published_at',
        'cover_image',
        'recommendations',
        'is_pinned',
        'blog_tags'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'recommendations' => 'array',
        'is_pinned' => 'boolean',
        'blog_tags' => 'array',
    ];

    protected static function booted(): void
    {
        static::saving(function (Blog $blog) {
            if ($blog->is_pinned) {
                Blog::where('id', '!=', $blog->id)
                    ->update(['is_pinned' => false]);
            }
        });
    }

    // Optional accessor for retrieving recommended blog objects
    public function getRecommendedPostsAttribute()
    {
        if (!$this->recommendations || !is_array($this->recommendations)) {
            return collect();
        }

        return Blog::whereIn('id', $this->recommendations)->get();
    }

    public function getTagsAttribute()
    {
        if (!$this->blog_tags || !is_array($this->blog_tags)) {
            return collect();
        }

        return BlogTag::whereIn('id', $this->blog_tags)->get();
    }
    
}
