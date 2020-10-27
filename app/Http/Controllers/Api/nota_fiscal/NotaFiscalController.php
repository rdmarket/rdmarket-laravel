<?php

namespace App\Http\Controllers\Api\nota_fiscal;


use App\Models\ItemNota;
use App\Models\ItemPedido;
use App\Models\NotaFiscal;
use App\Models\Pedido;
use App\Http\Controllers\Api\nota_fiscal\EstruturaItemNota;
use App\Http\Controllers\Api\nota_fiscal\EstruturaNotaFiscal;
use Illuminate\Support\Facades\DB;


class NotaFiscalController
{
    static public function gerarNotaFiscal($id_pedido)
    {

        $pedido = Pedido::find($id_pedido);
        
        $nf = new NotaFiscal;
        $nf->id_pedido = $pedido['id_pedido'];
        $nf->dt_emissao = date(DATE_RFC822);
        $nf->vl_nota = $pedido['vlr_total_pedido'];
        $nf->nr_nf = rand(1, 10000);
        $nf->nr_serie = rand(1, 10000);
        $nf->save();

        

        $itens = ItemPedido::all()->where('id_pedido', '=', $id_pedido);
        $n = NotaFiscal::all()->where('id_pedido', '=', $id_pedido);
        $id = $nf->id;
        
        foreach ($itens as $item) {
            $in = new ItemNota;
            $in->id_nf = $id;
            $in->id_produto = $item->id_produto;
            $in->qt_item = $item->qtd_item_produto;
            $in->vl_unitario = $item->vlr_total_item_pedido/$item->qtd_item_produto;
            $in->save();
        }

        // $dados = DB::table('nota_fiscal')
        // ->join('item_nota', 'nota_fiscal.id_nf', '=', 'item_nota.id_nf')
        // ->join('produto', 'item_nota.id_produto', '=', 'produto.id_produto')
        // ->join('tipo_produto', 'produto.id_tipo_produto', '=', 'tipo_produto.id_tipo_produto')
        // ->where('nota_fiscal.id_pedido','=',$id_pedido)
        // ->select('nota_fiscal.dt_emissao','nota_fiscal.vl_nota','nota_fiscal.nr_nf','nota_fiscal.nr_serie',
        //  'item_nota.qt_item','item_nota.vl_unitario',
        //  'produto.ds_produto','produto.data_aquisicao',
        //  'tipo_produto.ds_tipo_produto')
        // ->get();

         $dados = DB::table('nota_fiscal')
        ->join('item_nota', 'nota_fiscal.id_nf', '=', 'item_nota.id_nf')
        ->join('produto', 'item_nota.id_produto', '=', 'produto.id_produto')
        ->join('categoria_produto', 'produto.id_categoria', '=', 'categoria_produto.id_categoria')
        ->where('nota_fiscal.id_pedido','=',$id_pedido)
        ->select('item_nota.qt_item','item_nota.vl_unitario',
         'produto.ds_produto','produto.data_aquisicao',
         'categoria_produto.ds_categoria')
        ->get();

        
        $nota_fiscal = new EstruturaNotaFiscal;

        $nota_fiscal->dt_emissao = $nf['dt_emissao'];
        $nota_fiscal->vl_nota = $nf['vl_nota'];
        $nota_fiscal->nr_nf = $nf['nr_nf'];
        $nota_fiscal->nr_serie = $nf['nr_serie'];


        foreach($dados as $dado){
            
            $it = new EstruturaItemNota;
            $it->qt_item = $dado->qt_item;
            $it->vl_unitario = $dado->vl_unitario;
            $it->ds_produto = $dado->ds_produto;
            $it->data_aquisicao = $dado->data_aquisicao;
            $it->ds_tipo_produto = $dado->ds_categoria;
            $nota_fiscal->setItensNota($it);
        }


        return $nota_fiscal;
    }
}
