<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription', function (Blueprint $table) {
            $table->increments('id_pres');
            $table->integer('id_adm')->unsigned();
            $table->integer('id_medecin')->unsigned();
            $table->timestamp('date_pres');
            $table->text('observation');
            $table->foreign('id_adm')->references('id_adm')->on('admissions')->onDelete('cascade');
            $table->foreign('id_medecin')->references('id_med')->on('medecin')->onDelete('cascade');
        });
        /*Schema::table('prescription',function($table){
            $table->foreign('id_patient')->references('id_patient')->on('patients');
            $table->foreign('id_medecin')->references('id_medecin')->on('medecins');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescription');
    }
}
