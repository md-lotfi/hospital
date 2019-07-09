<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unite', function (Blueprint $table) {
            $table->increments('id_unite');
            $table->unsignedInteger('id_service');
            $table->string('nom_unite');
            $table->timestamps();
            $table->foreign('id_service')->references('id_service')->on('services')->onDelete('cascade');
        });
        /*Schema::table('unite',function($table){
            $table->foreign('id_service')->references('id_service')->on('services');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unite');
    }
}
