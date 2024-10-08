<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('reseller_id')->nullable();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_plan_id');
            $table->string('billing_cycle');
            $table->integer('amount');
            $table->integer('is_free')->length(1);
            $table->timestamp('next_due_date')->nullable();
            $table->timestamp('active_date')->nullable();
            $table->timestamp('suspend_date')->nullable();
            $table->timestamp('reactive_date')->nullable();
            $table->timestamp('terminate_date')->nullable();
            $table->string('status_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('order_id')->references('id')->on('user_order');
            $table->foreign('product_plan_id')->references('id')->on('product_plan');
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
        Schema::dropIfExists('user_subscriptions');
    }
}
