<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomePage;

class HomeController extends Controller
{
    public function getHomePage(Request $request){
        $home = HomePage::where('id', 1)->first();

        return response()->json($home, 200);
    }
}
