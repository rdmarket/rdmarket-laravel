<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preco', function (Blueprint $table) {
            $table->id('id_preco');
            $table->bigInteger('id_produto')->unsigned(); 
            $table->float('valor_aquisicao', 5,2);
            $table->float('valor_venda', 5,2);
            $table->integer('p_desconto');
            $table->enum('status_desconto',['ativo','desativado']);
            $table->date('dt_inicio_desconto');
            $table->date('dt_final_desconto');
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
        Schema::dropIfExists('precos');
    }
}
