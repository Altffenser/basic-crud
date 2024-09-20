<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * This migration will know when a user points a model.
     * p.e. User point a Post, just one time.
     */
    public function up(): void
    {
        Schema::create('pointed', function (Blueprint $table) {
            $table->id();
            $table->string('pointed_type');
            $table->unsignedBigInteger('pointed_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pointed');
    }
};
