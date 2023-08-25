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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('ItemName');
            $table->string('itemImage')->nullable();
            $table->longText('description');
            $table->integer('price');            
            $table->string('size');           
            $table->string('brand');
            $table->string('condition');
            $table->string('dateListed');
            $table->integer('quantity');
            $table->string('tags');
            $table->string('status');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('sellerUser_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('buyerUser_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
