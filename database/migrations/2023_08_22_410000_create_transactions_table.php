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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyerUser_id')->constrained('users');
            $table->foreignId('sellerUser_id')->constrained('users');
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
            $table->date('datePurchase');  
            $table->string('paymentDetails');            
            $table->string('shippingDetails');
            $table->enum('status', ['rejected', 'finished', 'pending'])->nullable();       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
