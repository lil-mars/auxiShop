<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name',40)->nullable();
            $table->string('name', 40)->nullable();
            $table->string('lastName', 40)->nullable();
            $table->string('occupation',30)->nullable();
            $table->string('address')->nullable();
            $table->string('city',20)->nullable();
            $table->string('postal_code', 30)->nullable();
            $table->string('country', 40)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->timestamps();
        });
        Schema::create('spare_provider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('provider_id')->nullable();
            $table->unsignedBigInteger('spare_id')->nullable();
            $table->float('price')->nullable();

            $table->foreign('spare_id')
                ->references('id')
                ->on('spares')
                ->onDelete('cascade');
            $table->foreign('provider_id')
                ->references('id')
                ->on('providers')
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
        Schema::dropIfExists('providers');
        Schema::dropIfExists('spare_provider');
    }
}
