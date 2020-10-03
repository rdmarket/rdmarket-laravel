<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaFiscalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota__fiscals', function (Blueprint $table) {
            $table->id('id_nf');
            $table->timestamps();
            $table->bigInteger('id_pedido');
            $table->dateTime('dt_emissao');
            $table->String('cl_nota');
            $table->bigInteger('nr_nf');
            $table->bigInteger('nr_serie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota__fiscals');
    }
}
