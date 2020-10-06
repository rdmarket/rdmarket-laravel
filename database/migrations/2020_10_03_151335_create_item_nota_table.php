<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_nota', function (Blueprint $table) {
            $table->id('nr_nf_item');
            $table->bigInteger('id_nf')->unsigned(); 
            $table->bigInteger('id_produto')->unsigned();
            $table->integer('qt_item');
            $table->float('vl_unitario', 5,2);
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
        Schema::dropIfExists('item__notas');
    }
}
