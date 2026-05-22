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
        Schema::create('educational_paths', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // taheel, tatweer, certificates
            $table->string('title_ar');
            $table->string('title_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('logo')->nullable();
            $table->string('color')->nullable();
            $table->string('duration')->nullable();
            $table->string('level')->nullable();
            $table->json('requirements')->nullable();
            $table->json('objectives')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_paths');
    }
};
