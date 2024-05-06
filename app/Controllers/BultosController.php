<?php 

namespace App\Controllers;

use App\Models\ControlBultosModel;
use App\Models\BultoModel;

class BultosController extends BaseController
{
    public function index()
    {
        $model = new ControlBultosModel();
        $data['bultos'] = $model->findAll();

        return view('control-bultos/lista', $data);
    }

    public function create()
    {
        return view('control-bultos/nuevo');
    }

    public function store()
    {
        $model = new ControlBultosModel();
        $data = [
            'fecha' => $this->request->getPost('fecha'),
            'corte_id' => $this->request->getPost('corte_id'),
            'cantidad_piezas' => $this->request->getPost('cantidad_piezas'),
            'repartidor_id' => $this->request->getPost('repartidor_id'),
        ];
        $model->save($data);
        return redirect()->to('/bultos');
    }

    public function reporte()
    {
        $model = new BultoModel();
        $data['bultos'] = $model->contarBultosPorEstado();

        return view('bultos/reporte', $data);
    }

}
