<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 40)->nullable();
            $table->string('address')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('status', 20)->nullable();
            $table->timestamps();
        });
        Schema::create('store_spare', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity')->nullable();
            $table->unsignedBigInteger('spare_id')->nullable();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->foreign('spare_id')
                ->references('id')
                ->on('spares')
                ->onDelete('cascade');
            $table->foreign('store_id')
                ->references('id')
                ->on('stores')
                ->onDelete('cascade');
            $table->timestamps();
            $table->string('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
