<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->bigInteger('id_cliente')->unsigned();
            $table->bigInteger('id_forma_pagamento')->unsigned();
            $table->string('nr_pedido');
            $table->float('vlr_total_pedido');
            $table->bigInteger('id_status_pedido')->unsigned();
            $table->bigInteger('id_endereco')->unsigned();
            $table->date('data_pedido');
            $table->bigInteger('nr_parcelas');
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
        Schema::dropIfExists('pedido');
    }
}
