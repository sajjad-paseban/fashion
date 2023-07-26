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
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('siteTitle',255)->nullable();
            $table->string('siteIcon',255)->nullable();
            $table->string('siteLogo',255)->nullable();
            $table->string('logoTitle',255)->nullable();
            $table->string('author',255)->nullable();
            $table->text('footerText')->nullable();
            $table->text('description')->nullable();
            $table->string('keywords',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting');
    }
};
