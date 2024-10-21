<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Emaillogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emaillogs', function (Blueprint $table) {

            $table->id();
            $table->string('to')->nullable();
            $table->string('subject')->nullable();
            $table->string('module_id')->nullable();
            $table->text('req')->nullable();
            $table->text('res')->nullable();
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
        Schema::dropIfExists('emaillogs');
    }
}
