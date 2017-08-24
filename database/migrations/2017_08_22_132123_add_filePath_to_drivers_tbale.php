<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilePathToDriversTbale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drivers', function (Blueprint $table){
            $table->string('VTCCard');
            $table->string('IDCard');
            $table->string('driveCard');
            $table->string('civilInsurance');
            $table->string('atoutFrance');
            $table->string('KBIS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
