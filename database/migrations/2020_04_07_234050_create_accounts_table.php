<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_role_id');//
            $table->foreign('account_role_id')->references('id')->on('account__roles');

            $table->unsignedBigInteger('governate_id');//
            $table->foreign('governate_id')->references('id')->on('governorates');

            $table->string('name');
            $table->integer('sumdept');
            $table->bigInteger('phone');
            $table->string('address');
            $table->date('dateadd');
            $table->string('note');
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
        Schema::dropIfExists('accounts');
    }
}
