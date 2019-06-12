<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlookupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slookup', function (Blueprint $table) {
            $table->increments('id_slookup');
            $table->integer('id_adm');
            $table->integer('id_service');
            $table->integer('id_unite');
            $table->integer('id_salle');
            $table->integer('id_lit');
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
        Schema::dropIfExists('slookup');
    }
}
