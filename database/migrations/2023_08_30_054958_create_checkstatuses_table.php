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
        Schema::create('checkstatuses', function (Blueprint $table) {
            $table->id();
            $table->string('eid');
            $table->date('data');
            $table->string('time');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('type')->nullable();
            $table->string('device')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkstatuses');
    }
};
