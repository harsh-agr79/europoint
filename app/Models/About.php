<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_image',
        'hero_title',
        'hero_description',
        'years_experience',
        'happy_travelers',
        'customer_satisfaction',
        'countries',
        'our_story',
        'story_image',
        'values',
        'team',
        'content',
    ];

    protected $casts = [
        'values' => 'array',
        'team' => 'array',
    ];
}
