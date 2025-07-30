<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_image',
        'slug',
        'order',
        'is_active',
        'title',
        'location',
        'price',
        'duration',
        'rating',
        'description_short',
        'images',
        'highlights',
        'itinerary',
        'inclusions',
        'exclusions',
        'description_long',
    ];

    protected $casts = [
        'images' => 'array',
        'highlights' => 'array',
        'itinerary' => 'array',
        'inclusions' => 'array',
        'exclusions' => 'array',
        'is_active' => 'boolean',
    ];
}
