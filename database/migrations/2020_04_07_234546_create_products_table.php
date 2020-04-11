<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('unit_price');
            $table->float('pur_price');
            $table->date('model');
            $table->mediumText('description');
            $table->date('expire');
            $table->date('production');
            $table->integer('qty');
            $table->integer('unitinstock');
            $table->integer('min_qty');
            $table->integer('max_qty');
            $table->unsignedBigInteger('stock_id');
            $table->foreign('stock_id')->references('id')->on('stocks');
            $table->unsignedBigInteger('product_states_id');
            $table->foreign('product_states_id')->references('id')->on('product__states');
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
        Schema::dropIfExists('products');
    }
}
