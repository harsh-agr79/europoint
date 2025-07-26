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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_image')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_description')->nullable();
            $table->string('years_experience')->nullable();
            $table->string('happy_travelers')->nullable();
            $table->string('customer_satisfaction')->nullable();
            $table->string('countries')->nullable();
            $table->text('our_story')->nullable();
            $table->string('story_image')->nullable();
            $table->json('values')->nullable();
            $table->json('team')->nullable();
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
