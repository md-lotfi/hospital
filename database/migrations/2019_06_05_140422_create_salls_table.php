<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salls', function (Blueprint $table) {
            $table->increments('id_salle');
            $table->integer('id_unite')->unsigned();
            $table->string('nom_salle');
            $table->timestamps();
        });
        /*Schema::table('salls',function($table){
            $table->foreign('id_unite')->references('id_unite')->on('unite');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salls');
    }
}
