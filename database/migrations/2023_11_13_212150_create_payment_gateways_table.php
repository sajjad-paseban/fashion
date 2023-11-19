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
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_system_id')
            ->nullable()
            ->references('id')
            ->on('payment_systems');
            $table->string('title',255)
            ->nullable();
            $table->string('img_path')
            ->nullable();
            $table->string('callback_url',255)
            ->nullable();
            $table->string('pin',255)
            ->nullable();
            $table->string('account_number',255)
            ->nullable();
            $table->string('code',255)
            ->nullable();
            $table->boolean('status')
            ->default(true)
            ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_gateways');
    }
};
