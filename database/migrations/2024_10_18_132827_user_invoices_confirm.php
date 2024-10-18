<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserInvoicesConfirm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_invoices_confirm', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('invoices_id');
            $table->string('pemilik_rekening');
            $table->number('nomor_rekening');
            $table->string('bukti_transfer');
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
        Schema::dropIfExists('user_invoices_confirm');
    }
}
