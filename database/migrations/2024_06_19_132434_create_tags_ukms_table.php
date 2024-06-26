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
        Schema::create('tags_ukms', function (Blueprint $table) {
            $table->unsignedBigInteger('ukm_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('ukm_id')->references('id')->on('ukms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->primary(['ukm_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags_ukms');
    }
};
