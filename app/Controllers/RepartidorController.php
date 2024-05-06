<?php 

namespace App\Controllers;

use App\Models\RepartidorModel;

class RepartidorController extends BaseController
{
    public function index()
    {
        $model = new RepartidorModel();
        $data['repartidor'] = $model->findAll();

        return view('repartidores/lista', $data);
    }

    public function create()
    {
        return view('repartidores/nuevo');
    }

    public function store()
    {
        $model = new RepartidorModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellidoPaterno' => $this->request->getPost('apellidoPaterno'),
            'apellidoMaterno' => $this->request->getPost('apellidoMaterno'),
        ];
        $model->save($data);
        return redirect()->to('/repartidor');
    }

}
