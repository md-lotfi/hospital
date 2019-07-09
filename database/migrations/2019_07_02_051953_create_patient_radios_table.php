<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientRadiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_radios', function (Blueprint $table) {
            $table->increments('id_pr');
            $table->integer('id_adm')->unsigned();
            $table->integer('id_med')->unsigned();
            $table->integer('id_radio')->unsigned();
            $table->text('results')->nullable();
            $table->timestamps();
            $table->foreign('id_adm')->references('id_adm')->on('admissions')->onDelete('cascade');
            $table->foreign('id_med')->references('id_med')->on('medecin')->onDelete('cascade');
            $table->foreign('id_radio')->references('id_radio')->on('radios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_radios');
    }
}
