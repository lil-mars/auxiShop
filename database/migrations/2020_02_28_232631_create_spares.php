<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->nullable();
        });
        Schema::create('car_lines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->nullable();
        });
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->nullable();
            $table->string('country', 100)->nullable();
        });
        Schema::create('spares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',6)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('description')->nullable();
//            $table->string('nationality',60)->nullable();
            $table->string('measure',50)->nullable();
            $table->string('product_code',30)->nullable();
            $table->string('original_code',50)->nullable();
            $table->integer('quantity')->nullable();
            $table->float('price');
            $table->float('price_m');
            $table->float('investment');
            $table->string('image',1000)->nullable();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('spare_car_line', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('spare_id')->nullable();
            $table->unsignedBigInteger('car_line_id')->nullable();

            $table->foreign('spare_id')
                ->references('id')
                ->on('spares')
                ->onDelete('cascade');

            $table->foreign('car_line_id')
                ->references('id')
                ->on('car_lines')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('car_lines');
        Schema::dropIfExists('brands');
        Schema::dropIfExists('spares');
        Schema::dropIfExists('spare_car_line');
    }
}
