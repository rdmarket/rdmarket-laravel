<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaFiscalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_fiscal', function (Blueprint $table) {
            $table->id('id_nf');
            $table->timestamps();
            $table->bigInteger('id_pedido')->unsigned(); 
            $table->dateTime('dt_emissao');
            $table->float('vl_nota',5,2);
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
