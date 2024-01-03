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
        Schema::create('metting_times', function (Blueprint $table) {
            $table->id();
            $table->string('host');
            $table->string('eid');
            $table->string('mid');
            $table->date('visit');
            $table->string('pid');
            $table->string('time');
            $table->string('file');
            $table->string('note');
            $table->string('status');
            $table->date('metting')->nullable();
            $table->date('duration')->nullable();
            $table->string('feedback')->nullable();
            $table->string('type')->nullable();
            $table->string('group');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metting_times');
    }
};