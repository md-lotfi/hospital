<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soins', function (Blueprint $table) {
            $table->increments('id_soin');
            $table->integer('id_medic');
            $table->integer('id_adm');
            $table->integer('id_inf');
            $table->string('dose_admini');
            $table->string('voie');
            $table->timestamps();
            $table->foreign('id_medic')->references('id_medic')->on('medicaments')->onDelete('cascade');
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
        Schema::dropIfExists('soins');
    }
}
