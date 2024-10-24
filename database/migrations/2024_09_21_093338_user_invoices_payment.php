<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserInvoicesPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_invoices_payment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoices_id');
            $table->integer('payment_method');
            $table->timestamp('payment_expired')->nullable();
            $table->string('payment_references')->nullable();
            $table->string('payment_virtualaccount')->nullable();
            $table->integer('payment_amount')->nullable();
            $table->integer('fee')->nullable();

            $table->foreign('invoices_id')->references('id')->on('user_invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_invoices_payment');
    }
}
