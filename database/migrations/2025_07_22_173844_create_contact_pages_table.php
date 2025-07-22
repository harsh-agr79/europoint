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
        Schema::create('contact_pages', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title')->nullable(); // Add 'meta_title' field
            $table->text('meta_description')->nullable();
            $table->string('meta_image')->nullable();
            $table->string('location')->nullable();
            $table->json('phone')->nullable(); // Array of phone numbers
            $table->json('email')->nullable(); // Array of email addresses
            $table->string('hours')->nullable(); // Opening hours
            $table->string('whatsapp_no')->nullable(); // WhatsApp number
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_pages');
    }
};
