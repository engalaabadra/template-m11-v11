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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_method_id')->nullable()->constrained('payment_methods')->nullOnDelete();
            $table->morphs('paymentable');//service that payed it , like : orderid , reservationid
            $table->morphs('payer');//to be general for any proj -> like user , customer 
            $table->float('amount');
            $table->string('currency_code');//if currency after this time -> changed , so should store it here
            $table->tinyInteger('type')->default(1);//1: payment , -1: refund
            $table->tinyInteger('status')->default(0);//0: pending , 1: completed , -1 : cancelled, 0 : failed
            $table->string('transaction_id')->nullable();
            $table->string('payment_response')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
