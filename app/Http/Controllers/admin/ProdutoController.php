<?php

namespace App\Http\Controllers\admin;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends BaseController
{
    public function __construct()
    {
         $this->classe = Produto::class;
         $this->view = 'admin.produto';
     
    }
}
