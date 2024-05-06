<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MantenimientoModel;

class ReporteMaquinaController extends Controller
{
    public function index()
    {
        // Lógica para mostrar el formulario de ingreso de detalles
        return view('mecanico/reporte-maquina');
    }

    public function generarReporte()
    {
        // Cargar el modelo
        $mantenimientoModel = new MantenimientoModel();
        
        // Obtener los datos de los reportes desde la base de datos
        $data['reportes'] = $mantenimientoModel->findAll();
        
        // Pasar los datos a la vista
        return view('mecanico/reporte_maquina_resultado', $data);
    }
}
