<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_image')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_sub_title')->nullable();
            $table->string('offer_title')->nullable();
            $table->json('offer_pics')->nullable();
            $table->string('offer_description')->nullable();
            $table->json('offer_bullets')->nullable();
            $table->json('visa_assistance')->nullable();
            $table->json('cards')->nullable();
            $table->string('travel_pic')->nullable();
            $table->json('travel_cards')->nullable();
            $table->string('ceo_pic')->nullable();
            $table->string('letter_title')->nullable();
            $table->text('letter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
