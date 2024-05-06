<?php 

namespace App\Controllers;

use App\Models\MaquinaModel;

class MaquinaController extends BaseController
{
    public function index()
    {
        $model = new MaquinaModel();
        $data['maquinas'] = $model->findAll();

        return view('maquina/lista', $data);
    }

    public function create()
    {
        return view('maquina/nuevo');
    }

    public function store()
    {
        $model = new MaquinaModel();
        $data = [
            'fechaAdquisicion' => $this->request->getPost('fechaAdquisicion'),
            'tipo' => $this->request->getPost('tipo'),
            'id_lineaProduccion' => $this->request->getPost('id_lineaProduccion'),
        ];
        $model->save($data);
        return redirect()->to('/maquina');
    }

}
