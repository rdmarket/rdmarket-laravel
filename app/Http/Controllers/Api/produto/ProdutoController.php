<?php

namespace App\Http\Controllers\Api\produto;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Http\Controllers\Api\BaseController;

class ProdutoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Produto::class;
    }

    public function listar(Request $req)
    {
       
    }
}
