<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_pedido', function (Blueprint $table) {
            $table->bigInteger('nr_item_pedido')->unsigned();
            $table->bigInteger('id_pedido')->unsigned();
            $table->bigInteger('id_produto')->unsigned();
            $table->bigInteger('qtd_item_produto');
            $table->integer('cd_status_item_pedido');
            $table->float('vlr_total_item_pedido');
            $table->date('data_item_pedido');
            $table->timestamps();
            $table->primary(['nr_item_pedido','id_pedido']);
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_pedido');
    }
}
