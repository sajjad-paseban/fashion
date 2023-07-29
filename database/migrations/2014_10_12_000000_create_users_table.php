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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phonenumber',255)->nullable();
            $table->string('email',255)->unique()->nullable();
            $table->date('birthdate')->nullable();
            $table->string('password',255)->nullable();
            $table->string('photo_path',255)->nullable();
            $table->boolean('is_admin')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
