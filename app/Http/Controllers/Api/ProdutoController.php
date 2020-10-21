<?php

namespace App\Http\Controllers\Api;

use App\Models\Produto;
use App\Models\TipoProduto;
use App\Models\Preco;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProdutoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Produto::class;
    }

    public function show($id_produto)
    {
        $itens = $this->classe::join('tipo_produto', 'produto.id_tipo_produto', '=', 'tipo_produto.id_tipo_produto')
        ->join('preco', 'produto.id_produto', '=', 'preco.id_produto')
        ->join('estoque', 'produto.id_produto', '=', 'estoque.id_produto')
        // ->join('imagem', 'produto.id_produto', '=', 'imagem.id_produto')
        ->select('produto.id_produto', 'produto.ds_produto', 'produto.data_aquisicao', 'tipo_produto.ds_tipo_produto',
                 'preco.valor_venda', 'preco.p_desconto', 'estoque.qtd_produto_estoque')
        ->where('produto.id_produto', '=', $id_produto)    
        ->get();

        if (empty($itens->all())) {
            return response()->json('Item não encontrado.', 404);
        }

        return response()->json($itens, 200);
    }

    public function listarCategorias()
    {
        $itens = Produto::all();

        if (empty($itens->all())) {
            return response()->json('Item não encontrado.', 404);
        }
        
        return response()->json($itens, 200);

    }

    public function listarPorTipo($id_tipo_produto) //Aqui o produto será listado de acordo com a categoria
    {
        $itens = $this->classe::join('tipo_produto', 'produto.id_tipo_produto', '=', 'tipo_produto.id_tipo_produto')
        ->join('preco', 'produto.id_produto', '=', 'preco.id_produto')
        ->join('estoque', 'produto.id_produto', '=', 'estoque.id_produto')
        // ->join('imagem', 'produto.id_produto', '=', 'imagem.id_produto')
        ->select('produto.id_produto', 'produto.ds_produto', 'produto.data_aquisicao', 'tipo_produto.id_tipo_produto','tipo_produto.ds_tipo_produto',
                 'preco.valor_venda', 'estoque.qtd_produto_estoque')
         ->where('produto.id_tipo_produto', $id_tipo_produto)
        ->get();
        
        if (empty($itens->all())) {
        return response()->json('Dado não encontrado.', 404);
        }
    
        return response()->json($itens, 200);

    }

    public function listarNovidades()
    {   
        $dados = $this->classe::join('tipo_produto', 'produto.id_tipo_produto', '=', 'tipo_produto.id_tipo_produto')
        ->join('preco', 'produto.id_produto', '=', 'preco.id_produto')
        ->join('estoque', 'produto.id_produto', '=', 'estoque.id_produto')
        // ->join('imagem', 'produto.id_produto', '=', 'imagem.id_produto')
        ->select('produto.id_produto', 'produto.ds_produto', 'produto.data_aquisicao', 'tipo_produto.ds_tipo_produto',
                 'preco.valor_venda', 'preco.p_desconto', 'estoque.qtd_produto_estoque')
        ->get();
        $dataAtual = Carbon::now();

        foreach($dados as $dado)
        {
            $dataAquisicao = Carbon::createFromFormat('Y-m-d', $dado->data_aquisicao);
            $tempoEntreDatas = $dataAquisicao->diffInDays($dataAtual);

            if ($tempoEntreDatas < 30){
                $itens[] = $dado;
            }
        }

        if (empty($itens)) {
            return response()->json('Dado não encontrado', 404);
        }

        return response()->json($itens, 200);

    }
    
    public function listarDescontos()
    {
        $dados = $this->classe::join('tipo_produto', 'produto.id_tipo_produto', '=', 'tipo_produto.id_tipo_produto')
        ->join('preco', 'produto.id_produto', '=', 'preco.id_produto')
        ->join('estoque', 'produto.id_produto', '=', 'estoque.id_produto')
        // ->join('imagem', 'produto.id_produto', '=', 'imagem.id_produto')
        ->select('produto.id_produto', 'produto.ds_produto', 'produto.data_aquisicao', 'tipo_produto.ds_tipo_produto',
                 'preco.valor_venda', 'preco.p_desconto', 'estoque.qtd_produto_estoque')
        ->get();

        foreach($dados as $dado)
        {

            if ($dado->p_desconto >= 30){
                $itens[] = $dado;
            }
        }

        if (empty($itens)) {
            return response()->json('Dado não encontrado', 404);
        }

        return response()->json($itens, 200);
    }

}
