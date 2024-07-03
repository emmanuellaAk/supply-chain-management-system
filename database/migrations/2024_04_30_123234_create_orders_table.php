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
        Schema::create('orders-reciept', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->decimal('total_price');
            // $table->foreignId('product_id')->references('id')->on('inventories')->cascadeOnUpdate()->cascadeOnDelete();
            // $table->foreignId('customer_id')->references('id')->on('customers')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
