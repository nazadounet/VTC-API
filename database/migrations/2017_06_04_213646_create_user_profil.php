<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use  \Illuminate\Support\Facades\Schema;

class CreateUserProfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('usersProfils', function(Blueprint $table){
           $table->increments('id');
           $table->string('lastname');
           $table->string('firstname');
           $table->string('sexe');
           $table->integer('payementId')->nullable();
           $table->integer('historyId')->nullable();
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
        Schema::drop('usersProfils');
    }
}
