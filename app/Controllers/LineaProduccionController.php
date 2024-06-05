<?php 

namespace App\Controllers;

use App\Models\LineaProduccionModel;

class LineaProduccionController extends BaseController
{
    public function index()
    {
        $model = new LineaProduccionModel();

        $data = [
            'lineas' => $model->paginate(10),
            'pager' => $model->pager,
        ];

        return view('linea_produccion/lista', $data);
    }

    public function create()
    {
        return view('linea_produccion/nuevo');
    }

    public function store()
    {
        $model = new LineaProduccionModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'usuario_id' => $this->request->getPost('id_usuario'),
        ];
        $model->save($data);
        return redirect()->to('/linea');
    }

}
