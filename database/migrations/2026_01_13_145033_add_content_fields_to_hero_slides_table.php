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
        Schema::table('hero_slides', function (Blueprint $table) {
            $table->string('badge_text')->nullable()->after('subtitle');
            $table->string('button_text')->nullable()->after('badge_text');
            $table->string('button_url')->nullable()->after('button_text');
            $table->string('secondary_button_text')->nullable()->after('button_url');
            $table->string('secondary_button_url')->nullable()->after('secondary_button_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hero_slides', function (Blueprint $table) {
            $table->dropColumn([
                'badge_text',
                'button_text',
                'button_url',
                'secondary_button_text',
                'secondary_button_url'
            ]);
        });
    }
};
