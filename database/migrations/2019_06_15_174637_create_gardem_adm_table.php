<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGardemAdmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gardem_adm', function (Blueprint $table) {
            $table->increments('id_gardem_adm');
            $table->integer('id_gardem');
            $table->integer('id_adm');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin')->nullable();
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
        Schema::dropIfExists('gardem_adm');
    }
}