<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfirmiereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infirmiere', function (Blueprint $table) {
            $table->increments('id_inf');
            $table->integer('id_user');
            //$table->string('nom_inf');
            $table->string('prenom_inf');
            $table->string('adr_inf');
            $table->string('tel_inf');
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
        Schema::dropIfExists('infirmiere');
    }
}