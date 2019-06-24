<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecretaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secretaire', function (Blueprint $table) {
            $table->increments('id_sec');
            $table->integer('id_user');
            $table->string('prenom_sec');
            $table->string('adr_sec');
            $table->string('tel_sec');
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
        Schema::dropIfExists('secretaire');
    }
}