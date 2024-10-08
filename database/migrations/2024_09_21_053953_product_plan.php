<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_plan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string( 'product_type');
            $table->unsignedBigInteger('product_group_id');
            $table->string('product_plan_name');
            $table->string('product_plan_code')->nullable();
            $table->text('product_plan_desc')->nullable();
            $table->string('product_plan_link')->nullable()->unique();
            $table->integer('apply_tax')->nullable();
            $table->integer('product_stock')->nullable()->length(11);
            $table->integer('is_hidden')->default(0)->length(1);
            $table->integer('product_template_email')->length(13)->nullable();
            $table->string( 'product_source')->nullable();
            $table->string( 'product_source_type')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_group_id')->references('id')->on('product_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_plan');
    }
}
