<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->boolean('active');
            $table->timestamp('activate_date');
            $table->timestamps();
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->foreign('token_id')->references('id')->on('booking_tokens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_tokens');
    }
}
