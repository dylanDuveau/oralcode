<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrbddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('boites', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->bigInteger('zone_id');
            $table->foreign('batiments_id')->references('id')->on('batiments');
            $table->varchar('cheminQrcode');
            $table->bigInteger('produits_id');
            $table->foreign('produits_id')->references('id')->on('produits');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qrbdd');
    }
}
