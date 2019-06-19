<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrelevementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prelevements', function (Blueprint $table) {
            $table->increments('id_prel');
            $table->integer('id_patient');
            //$table->integer('id_med');
            $table->integer('id_inf');
            $table->string('temp');
            $table->string('poid');
            $table->string('taille');
            $table->string('pouls');
            $table->string('tension_bas');
            $table->string('tension_haut');
            $table->string('glecymie');
            $table->string('diurese');
            $table->text('observation');
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
        Schema::dropIfExists('prelevements');
    }
}
