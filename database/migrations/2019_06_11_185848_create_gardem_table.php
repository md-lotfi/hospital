<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGardemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gardem', function (Blueprint $table) {
            $table->increments('id_gardem');
            $table->string('nom');
            $table->string('prenom');
            $table->string('lien_parent');
            $table->string('adr');
            $table->integer('tel');
            $table->string('date_fin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gardem');
    }
}
