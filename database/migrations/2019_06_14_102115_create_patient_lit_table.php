<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientLitTable extends Migration
{
    const LIT_BUSY = 1;
    const LIT_FREE = 0;
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
            $table->tinyInteger('busy')->default(self::LIT_BUSY);
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
        Schema::dropIfExists('patient_lit');
    }
}
