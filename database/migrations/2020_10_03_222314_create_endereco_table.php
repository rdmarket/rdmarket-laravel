<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->id('id_endereco');
            $table->bigInteger('id_tipo_endereco')->unsigned();
            $table->string('num_cep');
            $table->string('nm_rua');
            $table->string('num_endereco');
            $table->string('ds_complemento')->nullable()->default(NULL);
            $table->string('nm_bairro');
            $table->string('nm_cidade');
            $table->string('nm_estado');
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
        Schema::dropIfExists('endereco');
    }
}
