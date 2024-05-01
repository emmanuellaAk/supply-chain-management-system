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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->string('delivery_type');
            $table->string('order_status');
            // $table->unsignedBigInteger('product_id');
            $table->foreignId('product_id')->references('id')->on('inventories')->cascadeOnUpdate()->cascadeOnDelete();
            // $table->unsignedBigInteger('customer_id');
            $table->foreignId('customer_id')->references('id')->on('customers')->cascadeOnUpdate()->cascadeOnDelete();
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
