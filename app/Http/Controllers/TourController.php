<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\MetaTag;

class TourController extends Controller
{
    public function getTours(Request $request)
    {
        $tours = Tour::where('is_active', true)
            ->orderBy('order')
            ->get();

        return response()->json(['tours' => $tours, 'meta_tags' => MetaTag::where('slug', 'tours')->first()]);
    }

    public function getTour($slug)
    {
        $tour = Tour::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return response()->json($tour);
    }
}
