<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdonnancesMedicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnances_medic', function (Blueprint $table) {
            $table->increments('id_ord_medic');
            $table->integer('id_ord');
            $table->integer('id_medic');
            $table->string('doze_ord');
            $table->string('freq_ord');
            $table->string('qte_ord')->nullable();//durée de prise de médicaments
            $table->string('delay_ord');
            $table->timestamps();
            $table->foreign('id_ord')->references('id_ord')->on('ordonnances')->onDelete('cascade');
            $table->foreign('id_medic')->references('id_medic')->on('medicaments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordonnances_medic');
    }
}
