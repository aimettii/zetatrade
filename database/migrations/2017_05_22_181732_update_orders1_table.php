<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrders1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
//            $table->integer('tractor_id');
            $table->foreign('tractor_id')->references('id')->on('vehicles');
//            $table->integer('trailer_id');
            $table->foreign('trailer_id')->references('id')->on('vehicles');
//            $table->integer('counterpartie_id');
            $table->foreign('counterpartie_id')->references('id')->on('counterparties');
//            $table->integer('border_id');
            $table->foreign('border_id')->references('id')->on('borders');
//            $table->json('log');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
