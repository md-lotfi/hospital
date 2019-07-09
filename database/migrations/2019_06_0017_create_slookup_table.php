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
            $table->foreign('id_adm')->references('id_adm')->on('admissions')->onDelete('cascade');
            $table->foreign('id_service')->references('id_service')->on('services')->onDelete('cascade');
            $table->foreign('id_unite')->references('id_unite')->on('unite')->onDelete('cascade');
            $table->foreign('id_salle')->references('id_salle')->on('salls')->onDelete('cascade');
            $table->foreign('id_lit')->references('id_lit')->on('lits')->onDelete('cascade');
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
