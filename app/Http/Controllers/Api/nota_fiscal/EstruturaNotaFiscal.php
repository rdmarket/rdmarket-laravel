<?php

namespace App\Http\Controllers\Api\nota_fiscal;


class EstruturaNotaFiscal
{
    public $dt_emissao;
    public $vl_nota;
    public $nr_nf;
    public $nr_serie;
    public $itens_nota;

    public function __construct()
    {
        $this->itens_nota=[];
    }

    public function setItensNota(EstruturaItemNota $item){
        $this->itens_nota[]=$item;
    }

}
