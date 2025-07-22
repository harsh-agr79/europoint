<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    public function getFaq()
    {
        $faqs = FAQ::orderBy('order', 'desc')->get();
        return response()->json($faqs);
    }
}
