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
            $table->integer('id_adm');
            $table->integer('id_med');
            $table->text('diagnostic');
            $table->string('type');
            $table->dateTime('date_sortie');
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
        Schema::dropIfExists('sortie_patient');
    }
}
