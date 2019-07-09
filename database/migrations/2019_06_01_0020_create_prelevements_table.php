<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrelevementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prelevements', function (Blueprint $table) {
            $table->increments('id_prel');
            $table->integer('id_adm')->unsigned();
            //$table->integer('id_med');
            $table->integer('id_inf')->unsigned();
            $table->string('temp')->nullable();
            $table->string('poid')->nullable();
            $table->string('taille')->nullable();
            $table->string('pouls')->nullable();
            $table->string('tension_bas')->nullable();
            $table->string('tension_haut')->nullable();
            $table->string('glecymie')->nullable();
            $table->string('diurese')->nullable();
            $table->text('observation')->nullable();
            $table->timestamps();
            $table->foreign('id_adm')->references('id_adm')->on('admissions')->onDelete('cascade');
            $table->foreign('id_inf')->references('id_inf')->on('infirmiere')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prelevements');
    }
}
