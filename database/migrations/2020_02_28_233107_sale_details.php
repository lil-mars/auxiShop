<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SaleDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('spare_id')->nullable();
            $table->unsignedBigInteger('sale_id')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('discount')->nullable();
            $table->float('real_price')->nullable();


            $table->foreign('spare_id')
                ->references('id')
                ->on('spares')
                ->onDelete('cascade');
            $table->foreign('sale_id')
                ->references('id')
                ->on('sales')
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
        Schema::dropIfExists('sale_details');
    }
}
