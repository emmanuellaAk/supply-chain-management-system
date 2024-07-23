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
        Schema::create('technical_supports', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->longText('description');
            $table->unsignedBigInteger('customer_id');
            $table->string('status')->default('pending');
            $table->text('attachment')->nullable();;
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technical_supports');
    }
};
