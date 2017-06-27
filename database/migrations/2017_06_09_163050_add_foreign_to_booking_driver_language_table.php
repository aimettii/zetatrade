<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToBookingDriverLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->integer('booking_driver_language_id');
            $table->foreign('booking_driver_language_id')->references('id')->on('booking_driver_languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            //
        });
    }
}
