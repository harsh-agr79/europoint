<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\ContactPage;
use App\Models\ContactInfo;
use App\Models\SocialLink;

class ContactController extends Controller
{
    public function showContactPage()
    {
        $contactPage = ContactPage::first();

        $contactInfo = ContactInfo::all();

        $socialLinks = SocialLink::all();
        return response()->json([
            'contactPage' => $contactPage,
            'contactInfo' => $contactInfo,
            'socialLinks' => $socialLinks
        ], 200);
    }

    public function storeContactMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        $contactMessage = ContactMessage::create($validated);
        return response()->json($contactMessage, 201);
    }
}
