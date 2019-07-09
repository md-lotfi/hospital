<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientLitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_lit', function (Blueprint $table) {
            $table->increments('id_patient_lit');
            $table->integer('id_adm')->unsigned();
            $table->integer('id_salle')->unsigned();
            $table->integer('id_lit')->unsigned();
            $table->tinyInteger('busy')->default(\SP\PatientLit::LIT_BUSY);
            $table->timestamps();
            $table->foreign('id_adm')->references('id_adm')->on('admissions')->onDelete('cascade');
            $table->foreign('id_salle')->references('id_salle')->on('salls')->onDelete('cascade');
            $table->foreign('id_lit')->references('id_lit')->on('lits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_lit');
    }
}
