<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_image',
        'location',
        'phone', // Array of phone numbers
        'email', // Array of email addresses
        'hours', // Opening hours
        'whatsapp_no' // WhatsApp number
    ];

    protected $casts = [
        'phone' => 'array',
        'email' => 'array',
    ];
}
