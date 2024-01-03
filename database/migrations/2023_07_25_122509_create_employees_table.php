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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('eid')->unique();;
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('home')->nullable();
            $table->date('join')->nullable();
            $table->string('position')->nullable();
            $table->string('gender')->nullable();
            $table->string('status')->nullable();
            $table->string('photo')->nullable();
            $table->string('rating')->nullable();
            $table->date('leave')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }



};