<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedecinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medecin', function (Blueprint $table) {
            $table->increments('id_medecin');
            $table->string('nom');
            $table->string('prenom');
            $table->string('specialite');
            $table->string('grade');
            $table->timestamp('added');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medecin');
    }
}
