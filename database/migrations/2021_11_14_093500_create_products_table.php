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
            $table->id();
            $table->string('photo');
            $table->string('name');
            $table->text('description');
            $table->integer('stock');
            $table->integer('price');
            $table->integer('category_id')->unsigned();
            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
        $table->foreign('category_id')->references('id')->on('categories');
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
