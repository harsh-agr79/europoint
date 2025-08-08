<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
     protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_image',
        'hero_image',
        'hero_title',
        'hero_sub_title',
        'offer_title',
        'offer_pics',
        'offer_description',
        'offer_bullets',
        'visa_assistance',
        'cards',
        'travel_pic',
        'travel_cards',
        'ceo_pic',
        'letter_title',
        'letter',
    ];

    protected $casts = [
        'offer_pics' => 'array',
        'offer_bullets' => 'array',
        'visa_assistance' => 'array',
        'cards' => 'array',
        'travel_cards' => 'array',
    ];
}
