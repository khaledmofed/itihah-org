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
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page', 50);
            $table->string('section', 80);
            $table->string('key', 80);
            $table->string('type', 20)->default('text'); // text, textarea, image, url, html
            $table->text('value')->nullable();
            $table->timestamps();
            $table->unique(['page', 'section', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
