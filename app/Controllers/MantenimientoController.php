<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MantenimientoModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MantenimientoController extends Controller
{
    public function index()
    {
        $model = new MantenimientoModel();
        
        $data = [
            'mantenimientos' => $model->paginate(10),
            'pager' => $model->pager,
        ];

        return view('mantenimiento/lista', $data);
    }

    public function create()
    {
        return view('mantenimiento/nuevo');
    }

    public function store()
    {
        $model = new MantenimientoModel();
        $data = [
            'fecha' => $this->request->getPost('fecha'),
            'horaReporte' => $this->request->getPost('horaReporte'),
            'horaEntrega' => $this->request->getPost('horaEntrega'),
            'falla' => $this->request->getPost('falla'),
            'actividad' => $this->request->getPost('actividad'),
            'id_Usuario' => $this->request->getPost('id_Usuario'),
            'id_maquina' => $this->request->getPost('id_maquina'),
        ];
        $model->save($data);
        return redirect()->to('/mantenimiento');
    }

    public function editar($id)
    {
        $mantenimientoModel = new MantenimientoModel();
        $mantenimiento = $mantenimientoModel->find($id);

        // Pasar los datos del bulto a la vista de edición
        return view('mantenimiento/editar', ['mantenimiento' => $mantenimiento]);
    }

    public function actualizar($id)
    {
        // Verificar si los datos del formulario se enviaron correctamente
        if ($this->request->getMethod() === 'post') {
            // Obtener los datos enviados desde el formulario
            $mantenimientoData = [
                'fecha' => $this->request->getPost('fecha'),
                'horaReporte' => $this->request->getPost('horaReporte'),
                'horaEntrega' => $this->request->getPost('horaEntrega'),
                'falla' => $this->request->getPost('falla'),
                'actividad' => $this->request->getPost('actividad'),
                'id_Usuario' => $this->request->getPost('id_Usuario'),
                'id_maquina' => $this->request->getPost('id_maquina'),
            ];

            // Verificar si el mantenimiento con el ID especificado existe
            $mantenimientoModel = new MantenimientoModel();
            $mantenimiento = $mantenimientoModel->find($id);
            if (!$mantenimiento) {
                return redirect()->to(site_url('mantenimiento'))->with('error', 'Mantenimiento no encontrado');
            }

            // Validar los datos recibidos del formulario
            $validationRules = [
                'fecha' => 'required',
                'horaReporte' => 'required',
                'horaEntrega' => 'required',
                'falla' => 'required',
                'actividad' => 'required',
                'id_Usuario' => 'required',
                'id_maquina' => 'required',
            ];

            if (!$this->validate($validationRules)) {
                // Si la validación falla, volver a mostrar el formulario de edición con los errores
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Actualizar el mantenimiento en la base de datos
            if (!$mantenimientoModel->update($id, $mantenimientoData)) {
                return redirect()->to(site_url('mantenimiento'))->with('error', 'No se pudo actualizar el mantenimiento');
            }

            // Redirigir a la lista de mantenimiento con un mensaje de éxito
            return redirect()->to(site_url('mantenimiento'))->with('success', 'Mantenimiento actualizado exitosamente');
        }

        // Si la solicitud no es de tipo POST, redirigir a la lista de mantenimiento
        return redirect()->to(site_url('/dashboard'));
    }


    public function eliminar($id)
    {
        // Cargar el modelo de repartidor
        $mantenimientoModel = new MantenimientoModel();

        // Buscar el repartidor por su ID
        $mantenimiento = $mantenimientoModel->find($id);

        // Verificar si el repartidor existe
        if (!$mantenimiento) {
            // Redirigir con un mensaje de error si el repartidor no existe
            return redirect()->to(site_url('mantenimiento'))->with('error', 'Mantenimiento no encontrado');
        }

        // Eliminar el repartidor de la base de datos
        $mantenimientoModel->delete($id);

        // Redirigir a la lista de repartidores con un mensaje de éxito
        return redirect()->to(site_url('mantenimiento'))->with('success', 'Mantenimiento eliminado exitosamente');
    }

    public function generarReporteExcel()
    {
        $model = new MantenimientoModel();
        $fileName = 'reporte_mantenimiento.xlsx';
        $spreadsheet = new Spreadsheet();
        $mantenimientos = $model->findAll();

        $sheet = $spreadsheet->getActiveSheet();
        

        // Set headers
        $sheet->setCellValue('A1', 'Reporte de Mantenimientos');
        $sheet->setCellValue('A2', 'ID Mantenimiento');
        $sheet->setCellValue('B2', 'Fecha');
        $sheet->setCellValue('C2', 'Hora de Reporte');
        $sheet->setCellValue('D2', 'Hora de Entrega');
        $sheet->setCellValue('E2', 'Falla');
        $sheet->setCellValue('F2', 'Actividad');
        $sheet->setCellValue('G2', 'ID Usuario');
        $sheet->setCellValue('H2', 'ID Máquina');

        // Populate data
        $row = 3;
        foreach ($mantenimientos as $mantenimiento) {
            $sheet->setCellValue('A' . $row, $mantenimiento['id_mantenimiento']);
            $sheet->setCellValue('B' . $row, $mantenimiento['fecha']);
            $sheet->setCellValue('C' . $row, $mantenimiento['horaReporte']);
            $sheet->setCellValue('D' . $row, $mantenimiento['horaEntrega']);
            $sheet->setCellValue('E' . $row, $mantenimiento['falla']);
            $sheet->setCellValue('F' . $row, $mantenimiento['actividad']);
            $sheet->setCellValue('G' . $row, $mantenimiento['id_Usuario']);
            $sheet->setCellValue('H' . $row, $mantenimiento['id_maquina']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);

        header("Content-Type:application/vnd.ms-excel");
        header('Content-Disposition:attachment;filename="'.basename($fileName).'"');
        header('Expires:0');
        header('Cache-Control:must-revalidate');
        header('Pragma:public');
        header('Content-Length:'.filesize($fileName));
        flush();
        readfile($fileName);
        exit;
    }
}
