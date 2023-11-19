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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->nullable();
            $table->string('path',255)->nullable();
            $table->foreignId('category_id')
            ->nullable()
            ->references('id')
            ->on('category')
            ->onDelete('set null');
            $table->foreignId('user_id')
            ->nullable()
            ->references('id')
            ->on('user')
            ->onDelete('set null');
            $table->text('content')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
