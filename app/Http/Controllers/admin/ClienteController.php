<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class ClienteController extends BaseController
{
   public function __construct()
   {
        $this->classe = Cliente::class;
        $this->view = 'admin.clientes';
    
   }
}
