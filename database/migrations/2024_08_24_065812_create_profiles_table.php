<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            // About username, bio, website, github, x, facebook and photo
            $table->string('username')->unique();
            $table->text('bio')->nullable();
            $table->string('website')->nullable();
            $table->string('github')->nullable();
            $table->string('x')->nullable();
            $table->string('facebook')->nullable();
            $table->string('photo')->nullable();
            // About birthday, city and country
            $table->date('birthday')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            // About phone, occupation
            $table->string('phone')->nullable();
            $table->string('occupation')->nullable();
            // About hobbies, skills
            $table->string('hobbies')->nullable();
            $table->string('skills')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
