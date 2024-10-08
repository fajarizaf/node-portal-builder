<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserOrderItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_order_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('product_group_name');
            $table->string('product_plan_name');
            $table->string('promo')->nullable();
            $table->string('billing_cycle');
            $table->integer('unit_price')->length(200);
            $table->integer('qty')->length(0);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('user_order');
            $table->foreign('product_id')->references('id')->on('product_plan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_order_item');
    }
}
