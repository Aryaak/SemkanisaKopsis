<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->biginteger('order_id')->unsigned();
            $table->biginteger('product_id')->unsigned();
            $table->integer('qty');
            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });
        Schema::table('order_products', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->ondelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
