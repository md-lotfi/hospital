<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->increments('id_adm');
            $table->integer('id_patient')->unsigned();
            $table->string('motif');
            $table->string('diag');
            $table->dateTime('date_adm');
            //$table->dateTime('date_sort');
            //$table->string('etat_sort');
            $table->timestamps();
        });
        Schema::table('admissions',function($table){
            $table->foreign('id_patient')->references('id_patient')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions');
    }
}
