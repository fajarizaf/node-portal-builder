<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SitePaymentMethod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_payment_method', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method_name');
            $table->string('payment_method_group');
            $table->string('gateway');
            $table->string('channel_id')->nullable();
            $table->integer('fee');
            $table->string('payment_method_logo');
            $table->integer('is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_payment_method');
    }
}
