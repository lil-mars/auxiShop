<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name', 20)->nullable();
            $table->string('father_last_name',20)->nullable();
            $table->string('mother_last_name',20)->nullable();
            $table->string('second_name',20)->nullable();
            $table->string('name',20)->nullable();
            $table->string('occupation',30)->nullable();
            $table->string('address',20)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('fax',20)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
