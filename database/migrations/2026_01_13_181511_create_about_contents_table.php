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
        Schema::create('about_contents', function (Blueprint $table) {
            $table->id();
            
            // Page Header
            $table->string('page_title')->default('আমার সম্পর্কে');
            $table->text('page_subtitle')->nullable();
            
            // Bio Section
            $table->string('bio_image')->nullable();
            $table->string('bio_title')->default('রাজনৈতিক নেতা ও সমাজসেবক');
            $table->text('bio_description_1')->nullable();
            $table->text('bio_description_2')->nullable();
            
            // Info Grid
            $table->string('full_name')->default('BNP রাজনৈতিক নেতা');
            $table->string('party_name')->default('বাংলাদেশ জাতীয়তাবাদী দল (BNP)');
            $table->string('constituency')->default('ঢাকা, বাংলাদেশ');
            $table->string('experience')->default('১০+ বছর জনসেবা');
            
            // Quote Section
            $table->text('quote_text')->nullable();
            $table->string('quote_author')->default('রাজনৈতিক নেতা');
            
            // Vision Cards (stored as JSON)
            $table->json('vision_cards')->nullable();
            
            // Timeline Events (stored as JSON)
            $table->json('timeline_events')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_contents');
    }
};
