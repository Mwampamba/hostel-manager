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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('dormitory_id');
            $table->string('picture');
            $table->mediumText('description')->nullable();
            $table->tinyInteger('status')->default('1')->comment('0==taken, 1==not taken');
            $table->foreign('dormitory_id')->references('id')->on('dormitories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
