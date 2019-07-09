<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsychtropesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psychtropes', function (Blueprint $table) {
            $table->increments('id_psy');
            $table->integer('id_adm');
            $table->integer('id_inf');
            $table->integer('id_med');
            $table->string('nom_psy');
            $table->string('mat_psy');
            $table->timestamps();
            $table->foreign('id_adm')->references('id_adm')->on('admissions')->onDelete('cascade');
            $table->foreign('id_inf')->references('id_inf')->on('infirmiere')->onDelete('cascade');
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
        Schema::dropIfExists('psychtropes');
    }
}
