<?php 

namespace App\Controllers;

use App\Models\CorteTelaModel;
use App\Models\DefectoModel;
use App\Models\CorteDefectoModel;
use App\Models\CorteModel;

class CorteController extends BaseController
{
    public function registrarDefectos()
    {
        return view('corte-defectos/registro-defectos');
    }

    public function storeDefectos()
    {
        $model = new CorteDefectoModel();
        $data = [
            'fecha' => $this->request->getPost('fecha'),
            'corte_id' => $this->request->getPost('corte_id'),
            'defecto_id' => $this->request->getPost('defecto_id'),
            'cantidad_piezas' => $this->request->getPost('cantidad_piezas'),
        ];
        $model->save($data);
        return redirect()->to('corte-defectos/registro-defectos');
    }

    public function create()
    {
        return view('cortes/nuevo');
    }

    public function storeNuevo()
    {
        $model = new CorteModel();
        $data = [
            'descripcion' => $this->request->getPost('descripcion'),
        ];
        $model->save($data);
        return redirect()->to('cortes/nuevo');
    }

    public function verRegistro()
    {
        return view('');
    }
}
