<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserInvoicesTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_invoices_transaction', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('invoices_id');
            $table->string('gateway');
            $table->string('channel');
            $table->string('txnid');
            $table->integer('amount_in')->nullable();
            $table->integer('amount_out')->nullable();
            $table->string('payment_status');
            $table->timestamps();
            
            $table->foreign('invoices_id')->references('id')->on('user_invoices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_invoices_transaction');
    }
}
