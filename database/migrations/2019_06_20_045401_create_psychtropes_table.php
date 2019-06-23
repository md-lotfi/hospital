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
            $table->integer('id_patient');
            $table->integer('id_inf');
            $table->integer('id_med');
            $table->string('nom_psy');
            $table->string('mat_psy');
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
        Schema::dropIfExists('psychtropes');
    }
}
