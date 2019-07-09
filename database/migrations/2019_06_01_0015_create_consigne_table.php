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
            $table->integer('id_adm')->unsigned();
            $table->integer('id_medecin')->unsigned();
            $table->tinyInteger('received')->nullable()->default(0);//set to 1 if doctor saw the notif
            $table->text('observation');
            $table->timestamps();
            $table->foreign('id_adm')->references('id_adm')->on('admissions')->onDelete('cascade');
            $table->foreign('id_medecin')->references('id_med')->on('medecin')->onDelete('cascade');
        });
        /*Schema::table('consigne',function($table){
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
        Schema::dropIfExists('consigne');
    }
}
