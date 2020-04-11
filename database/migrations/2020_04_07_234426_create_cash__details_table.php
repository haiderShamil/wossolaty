<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash__details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cash_type_id');
            $table->foreign('cash_type_id')->references('id')->on('cash__types');

            $table->string('name');
            $table->float('amount');
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash__details');
    }
}
