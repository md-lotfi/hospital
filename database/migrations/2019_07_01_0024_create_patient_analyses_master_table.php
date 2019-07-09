<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientAnalysesMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_analyses_master', function (Blueprint $table) {
            $table->increments('id_pam');
            $table->integer('id_adm')->unsigned();
            $table->integer('id_med')->unsigned();
            $table->text('observation')->nullable();
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
        Schema::dropIfExists('patient_analyses_master');
    }
}
