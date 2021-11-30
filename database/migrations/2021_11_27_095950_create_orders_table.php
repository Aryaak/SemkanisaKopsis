<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id')->unsigned();
            $table->biginteger('status_id')->unsigned()->default(1);
            $table->biginteger('payment_id')->unsigned();
            $table->biginteger('total');
            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->ondelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
