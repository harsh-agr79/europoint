<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function toggleWishlist(Request $request)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
        ]);

        $wishlist = Wishlist::where('customer_id', $request->user()->id)
            ->where('tour_id', $request->input('tour_id'))
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['message' => 'Tour removed from wishlist', 'wishlist' => Wishlist::where('customer_id', $request->user()->id)
            ->with('tour')
            ->get()]);
        }

        Wishlist::create([
            'customer_id' => $request->user()->id,
            'tour_id' => $request->input('tour_id'),
        ]);

        return response()->json(['message' => 'Tour added to wishlist', 'wishlist' => Wishlist::where('customer_id', $request->user()->id)
            ->with('tour')
            ->get()]);
    }

    public function getWishlist(Request $request)
    {
        $wishlists = Wishlist::where('customer_id', $request->user()->id)
            ->with('tour')
            ->get();

        return response()->json($wishlists);
    }
}
