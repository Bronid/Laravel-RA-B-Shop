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
        Schema::create('transaction_groups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buyer_user_id')->unsigned()->nullable();
            $table->float('total');
            $table->timestamps();

            $table->foreign('buyer_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_groups');
    }
};
