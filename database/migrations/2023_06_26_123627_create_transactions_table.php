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
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->bigInteger('seller_user_id')->unsigned()->nullable();
            $table->string('product_name');
            $table->bigInteger('quantity');
            $table->float('price');
            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('transaction_groups')->onDelete('cascade');
            $table->foreign('seller_user_id')->references('id')->on('users')->onDelete('cascade');
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
