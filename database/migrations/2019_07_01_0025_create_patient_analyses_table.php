<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_analyses', function (Blueprint $table) {
            $table->increments('id_pa');
            $table->integer('id_pam')->unsigned();
            $table->integer('id_analyse')->unsigned();
            $table->text('results')->nullable();
            $table->timestamps();
            $table->foreign('id_pam')->references('id_pam')->on('patient_analyses_master')->onDelete('cascade');
            $table->foreign('id_analyse')->references('id_analyse')->on('analyses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_analyses');
    }
}
