<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateVehicleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('vehicles', function (Blueprint $table) {
//            $table->timestamps();
//        });

        Schema::table('vehicle_types', function (Blueprint $table) {
            $table->string('type', 7);
        });

//        Schema::table('vehicle_brands', function (Blueprint $table) {
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            //
        });
    }
}
