<?php

namespace App\Http\Controllers\Api;

use App\Models\Produto;
use App\Models\Imagem;
use App\Models\TipoProduto;
use App\Models\Preco;
use App\Http\Controllers\Controller;
use App\Models\CategoriaProduto;
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
        $itens = $this->classe::join('categoria_produto', 'produto.id_categoria', '=', 'categoria_produto.id_categoria')
        ->join('preco', 'produto.id_produto', '=', 'preco.id_produto')
        ->join('estoque', 'produto.id_produto', '=', 'estoque.id_produto')
        ->join('imagem', 'produto.id_produto', '=', 'imagem.id_produto')
        ->select('produto.id_produto', 'produto.ds_produto', 'produto.data_aquisicao', 'categoria_produto.ds_categoria',
                 'preco.valor_venda', 'preco.status_desconto','preco.p_desconto', 'estoque.qtd_produto_estoque','imagem.*')
        ->where('produto.id_produto', '=', $id_produto)
        ->where('imagem.ds_imagem_produto','=','frente')
        ->get();

        if (empty($itens->all())) {
            return response()->json('Item não encontrado.', 404);
        }

        return response()->json($itens, 200);
    }

    public function listarCategorias()
    {
        $itens = CategoriaProduto::all();
        
        if (empty($itens->all())) {
        return response()->json('Dado não encontrado.', 404);
        }
    
        return response()->json($itens, 200);

    }

    public function listarPorTipo($id_categoria) //Aqui o produto será listado de acordo com a categoria
    {
        $itens = $this->classe::join('categoria_produto', 'produto.id_categoria', '=', 'categoria_produto.id_categoria')
        ->join('preco', 'produto.id_produto', '=', 'preco.id_produto')
        ->join('estoque', 'produto.id_produto', '=', 'estoque.id_produto')
        ->join('imagem', 'produto.id_produto', '=', 'imagem.id_produto')
        ->select('produto.id_produto', 'produto.ds_produto', 'produto.data_aquisicao', 'categoria_produto.id_categoria','categoria_produto.ds_categoria',
                 'preco.valor_venda', 'preco.p_desconto','preco.status_desconto','estoque.qtd_produto_estoque','imagem.*')
         ->where('produto.id_categoria', $id_categoria)


         ->where('imagem.ds_imagem_produto','=','frente')

        ->get();
        
        if (empty($itens->all())) {
        return response()->json('Dado não encontrado.', 404);
        }
    
        return response()->json($itens, 200);

    }

    public function listarNovidades()
    {   
        $dados = $this->classe::join('categoria_produto', 'produto.id_categoria', '=', 'categoria_produto.id_categoria')
        ->join('preco', 'produto.id_produto', '=', 'preco.id_produto')
        ->join('estoque', 'produto.id_produto', '=', 'estoque.id_produto')
        ->join('imagem', 'produto.id_produto', '=', 'imagem.id_produto')
        ->where('imagem.ds_imagem_produto','=','frente')
        ->select('produto.id_produto', 'produto.ds_produto', 'produto.data_aquisicao', 'categoria_produto.ds_categoria',
                 'preco.valor_venda', 'preco.p_desconto','preco.status_desconto', 'estoque.qtd_produto_estoque','imagem.*')
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
        $dados = $this->classe::join('categoria_produto', 'produto.id_categoria', '=', 'categoria_produto.id_categoria')
        ->join('preco', 'produto.id_produto', '=', 'preco.id_produto')
        ->join('estoque', 'produto.id_produto', '=', 'estoque.id_produto')
        ->join('imagem', 'produto.id_produto', '=', 'imagem.id_produto')
        ->where('imagem.ds_imagem_produto','=','frente')
        ->where('preco.status_desconto','=','ativo')
        ->select('produto.id_produto', 'produto.ds_produto', 'produto.data_aquisicao', 'categoria_produto.ds_categoria',
                 'preco.valor_venda', 'preco.p_desconto', 'estoque.qtd_produto_estoque','imagem.*')
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
    public function listarBanner()
    {
        $dados = $this->classe::join('imagem', 'produto.id_produto', '=', 'imagem.id_produto')
        ->where('imagem.ds_imagem_produto','=','banner')
        ->select('imagem.*')
        ->get();

        foreach($dados as $dado)
        {
                $itens[] = $dado;   
        }

        if (empty($itens)) {
            return response()->json('Dado não encontrado', 404);
        }

        return response()->json($itens, 200);
    }

}
