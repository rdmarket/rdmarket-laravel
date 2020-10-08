<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartao', function (Blueprint $table) {
            $table->id('id_cartao');
            $table->bigInteger('id_cliente')->unsigned();
            $table->bigInteger('id_tipo_cartao')->unsigned();
            $table->string('num_cartao');
            $table->string('num_cpf');
            $table->string('nm_impresso');
            $table->string('nm_bandeira');
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
        Schema::dropIfExists('cartao');
    }
}
