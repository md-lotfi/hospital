<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfirmiereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infirmiere', function (Blueprint $table) {
            $table->increments('id_inf');
            $table->integer('nom');
            $table->integer('prenom');
            $table->integer('adr');
            $table->timestamp('date_heur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infirmiere');
    }
}
