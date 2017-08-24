<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use\Illuminate\Support\Facades\Schema;

class CreateDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('drivers', function (Blueprint $table){
          $table->increments('id');
          $table->string('lastname');
          $table->string('firstname');
          $table->string('email');
          $table->integer('status')->nullable();
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
        Schema::dropIfExists('drivers');
    }
}
