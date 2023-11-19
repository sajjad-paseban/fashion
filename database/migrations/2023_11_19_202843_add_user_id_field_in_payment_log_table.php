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
        Schema::table('payment_log', function (Blueprint $table) {
            $table->foreignId('user_id')
            ->nullable()
            ->after('post_id')
            ->references('id')
            ->on('user')
            ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_log', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
        });
    }
};
