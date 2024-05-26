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
        Schema::create('ukms', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('banner');
            $table->string('short_name');
            $table->string('long_name');
            $table->string('short_description');
            $table->text('about_us');
            $table->text('vision');
            $table->text('mission');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('instagram');
            $table->string('linkedin');
            $table->string('youtube');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukms');
    }
};
