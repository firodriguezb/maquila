<?php 

namespace App\Controllers;

use App\Models\PedidoModel;

class PedidosController extends BaseController
{
    public function index()
    {
        $model = new PedidoModel();
        $data['pedidos'] = $model->getPedidosConDetalles();

        return view('pedidos/lista', $data);
    }
}
