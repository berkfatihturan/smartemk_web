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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default("NULL")->nullable();
            $table->string('main_color')->default("#000000")->nullable();
            $table->string('second_color')->default("#000000")->nullable();
            $table->string('keywords')->default("NULL")->nullable();
            $table->text('description')->default("NULL")->nullable();
            $table->string('logo', 256)->default("NULL")->nullable();
            $table->string('icon', 256)->default("NULL")->nullable();
            $table->string('image', 256)->default("NULL")->nullable();
            $table->string('background_image', 256)->default("NULL")->nullable();
            $table->mediumText('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
