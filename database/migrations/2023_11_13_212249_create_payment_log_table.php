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
        Schema::create('payment_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')
            ->nullable()
            ->references('id')
            ->on('post');
            $table->foreignId('user_id')
            ->nullable()
            ->references('id')
            ->on('user');
            $table->bigInteger('amount')
            ->nullable();
            $table->string('trans_id',255)
            ->nullable();
            $table->string('tracking_number',255)
            ->nullable();
            $table->string('card_number',255)
            ->nullable();
            $table->string('bank',255)
            ->nullable();
            $table->boolean('status')
            ->default(false)
            ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_log');
    }
};
