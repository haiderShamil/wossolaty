<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_type_id');//
            $table->foreign('invoice_type_id')->references('id')->on('invoice__types');

            $table->unsignedBigInteger('payment_type_id');//
            $table->foreign('payment_type_id')->references('id')->on('payment__types');

            $table->unsignedBigInteger('account_id');//
            $table->foreign('account_id')->references('id')->on('accounts');

            $table->unsignedBigInteger('product_id');//
            $table->foreign('product_id')->references('id')->on('products');

            $table->string('accountname');
            $table->string('productname');
            $table->integer('price');
            $table->integer('amount');
            $table->integer('total');
            $table->integer('no');
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
        Schema::dropIfExists('invoices');
    }
}
