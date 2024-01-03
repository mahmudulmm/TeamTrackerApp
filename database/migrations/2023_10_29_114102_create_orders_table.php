<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('eid');
            $table->string('mid')->unique();
            $table->string('pid');
            $table->string('status')->default('1');
            $table->string('type');
            $table->string('pt_type');
            $table->string('price');
            $table->string('total');
            $table->string('advance');
            $table->string('payment');
            $table->string('due');
            $table->date('billing_date')->nullable();
            $table->date('agreement')->nullable();
            $table->date('delivery')->nullable();
            $table->string('monthly_fee');
            $table->timestamps();
        });

    }
   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};