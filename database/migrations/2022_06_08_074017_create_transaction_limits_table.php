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
        Schema::create('transaction_limits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('daily_amount');
            $table->double('monthly_amount');
            $table->string('level_id');
            $table->foreignId('transaction_type_id');
            $table->foreignId('currency_id');
            $table->longText('description');
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
        Schema::dropIfExists('transaction_limits');
    }
};
