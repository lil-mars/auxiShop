<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
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
            $table->string('code',20);
            $table->string('description');
            $table->string('brand',50);
            $table->string('category',50);
            $table->string('country',50);
            $table->string('measure',50);
            $table->string('productCode',30);
            $table->float('price');
            $table->float('investment');
            $table->string('originalCode',50);
            $table->string('image');
            $table->integer('quantity');
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
