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
        Schema::create('block_friend', function (Blueprint $table) {
            $table->id();
            $table->foreignId('friendship_id')->constrained('friendships', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('blocked_by_id');
            $table->integer('blocked_user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('block_friend');
    }
};
