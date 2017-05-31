<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOtherTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('borders', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('phones', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::create('sale_phone', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id');
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->integer('phone_id');
            $table->foreign('phone_id')->references('id')->on('phones');
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
        Schema::table('borders', function (Blueprint $table) {
            //
        });
    }
}
