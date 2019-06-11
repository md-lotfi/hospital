<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsigneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consigne', function (Blueprint $table) {
            $table->increments('id_consigne');
            $table->integer('id_patient');
            $table->integer('id_medecin');
            $table->timestamp('date_heur');
            $table->text('observation');
        });
        Schema::table('consigne',function($table){
            $table->foreign('id_patient')->references('id_patient')->on('patients');
            $table->foreign('id_medecin')->references('id_medecin')->on('medecins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consigne');
    }
}
