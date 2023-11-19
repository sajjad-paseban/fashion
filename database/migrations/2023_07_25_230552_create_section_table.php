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
        Schema::create('section', function (Blueprint $table) {
            $table->id();
            $table->string('headerFarsiTitle',255)->nullable();
            $table->string('headerPhotoPath',255)->nullable();
            $table->json('headerSlogan')->nullable();
            $table->string('worldPhoto',255)->nullable();
            $table->text('worldContent')->nullable();
            $table->text('trainingContent')->nullable();
            $table->string('biographyPhotoPath',255)->nullable();
            $table->text('biographyContent')->nullable();
            $table->text('socialNetworkContent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section');
    }
};
