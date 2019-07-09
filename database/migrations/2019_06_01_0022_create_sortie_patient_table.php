<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSortiePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortie_patient', function (Blueprint $table) {
            $table->increments('id_sp');
            $table->integer('id_adm')->unsigned();
            $table->integer('id_med')->unsigned();
            $table->text('diagnostic');
            $table->string('type');
            $table->dateTime('date_sortie');
            $table->time('heur_sortie');
            $table->timestamps();
            $table->foreign('id_adm')->references('id_adm')->on('admissions')->onDelete('cascade');
            $table->foreign('id_med')->references('id_med')->on('medecin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sortie_patient');
    }
}
