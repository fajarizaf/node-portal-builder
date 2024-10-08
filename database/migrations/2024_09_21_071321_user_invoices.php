<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoices_number')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('invoices_type');
            $table->timestamp('invoices_date')->nullable();
            $table->timestamp('invoices_duedate')->nullable();
            $table->timestamp('invoices_datepaid')->nullable();
            $table->integer('tax')->length(5)->nullable();
            $table->integer('sub_total')->length(200);
            $table->integer('total')->length(200);
            $table->integer('is_publish')->length(1);
            $table->string('status_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_id')->references('status_code')->on('site_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_invoices');
    }
}
