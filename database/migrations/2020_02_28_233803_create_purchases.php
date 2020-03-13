<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('provider_id')->nullable();
            $table->string('contact')->nullable();
            $table->float('total_price')->nullable();

            $table->timestamps();
            $table->foreign('provider_id')
                ->references('id')
                ->on('providers')
                ->onDelete('cascade');
        });
        Schema::create('purchase_spare', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('purchase_id')->nullable();
            $table->unsignedBigInteger('spare_id')->nullable();
            $table->float('unit_price')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->nullable();

            $table->foreign('spare_id')
                ->references('id')
                ->on('spares')
                ->onDelete('cascade');

            $table->foreign('purchase_id')
                ->references('id')
                ->on('purchases')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('purchase_spare');
    }
}
