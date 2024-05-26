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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ukm_id');
            $table->foreign('ukm_id')->references('id')->on('ukms')->onDelete('cascade')->onUpdate('cascade');
            $table->string('image');
            $table->string('links');
            $table->string('title');
            $table->string('short_description');
            $table->text('long_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
