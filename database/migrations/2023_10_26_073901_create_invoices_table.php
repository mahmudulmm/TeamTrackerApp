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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('cid');
            $table->string('eid');
            $table->string('pid');
            $table->string('mettingid');
            $table->string('invoiceid');
            $table->string('total');
            $table->string('due');
            $table->string('advance');
            $table->string('date');
            $table->string('discount')->nullable();
            $table->string('extra');
            $table->string('vat');
            $table->string('lastpay');
            $table->string('expiredat');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};