<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from')->nullable();
            $table->foreignId('to')->nullable();
            $table->double('transfer_amount');
            $table->double('charged');
            $table->double('total');
            $table->foreignId('currency_id');
            $table->string('description')->nullable();
            $table->foreignId('user_id');//Staff
            $table->foreignId('transactionType_id');
            $table->foreignId('service_id')->nullable();
            $table->integer('status');// pending, approved, cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
