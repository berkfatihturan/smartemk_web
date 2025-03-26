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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default("NULL")->nullable();
            $table->text('subject')->default("NULL")->nullable();
            $table->text('description')->default("NULL")->nullable();
            $table->string('keywords')->default("NULL")->nullable();
            $table->string('image', 256)->default("NULL")->nullable();
            $table->mediumText('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
