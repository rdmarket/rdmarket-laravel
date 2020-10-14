<?php

namespace App\Http\Controllers\Api\nota_fiscal;


use App\Models\ItemNota;
use App\Models\ItemPedido;
use App\Models\NotaFiscal;
use App\Models\Pedido;
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
        $id = $n[0]->getAttributes();

        foreach ($itens as $item) {
            $in = new ItemNota;
            $in->id_nf = $id['id_nf'];
            $in->id_produto = $item->id_produto;
            $in->qt_item = $item->qtd_item_produto;
            $in->vl_unitario = $item->vlr_total_item_pedido/$item->qtd_item_produto;
            $in->save();
        }

        $dados = DB::table('nota_fiscal')
        ->join('item_nota', 'nota_fiscal.id_nf', '=', 'item_nota.id_nf')
        ->join('produto', 'item_nota.id_produto', '=', 'produto.id_produto')
        ->join('tipo_produto', 'produto.id_tipo_produto', '=', 'tipo_produto.id_tipo_produto')
        ->where('nota_fiscal.id_pedido','=',$id_pedido)
        ->select('nota_fiscal.dt_emissao','nota_fiscal.vl_nota','nota_fiscal.nr_nf','nota_fiscal.nr_serie',
         'item_nota.qt_item','item_nota.vl_unitario',
         'produto.ds_produto','produto.data_aquisicao',
         'tipo_produto.ds_tipo_produto')
        ->get();

        return $dados;
    }
}
