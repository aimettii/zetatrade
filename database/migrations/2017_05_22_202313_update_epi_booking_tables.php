<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEpiBookingTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_types', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('booking_statuses', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('puesc_statuses', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('epi_requests', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('epi_sources', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('epi_statuses', function (Blueprint $table) {
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
        Schema::table('booking_types', function (Blueprint $table) {
            //
        });
    }
}
