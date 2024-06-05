<?php

namespace App\Controllers;

use App\Models\MaquinaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MaquinaController extends BaseController
{
    public function index()
    {
        $model = new MaquinaModel();
        $data = [
            'maquinas' => $model->paginate(10),
            'pager' => $model->pager,
        ];

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

    public function editar($id)
    {
        $maquinaModel = new MaquinaModel();
        $maquina = $maquinaModel->find($id);

        // Pasar los datos de la maquina a la vista de edición
        return view('maquina/editar', ['maquina' => $maquina]);
    }

    public function actualizar($id)
    {
        // Verificar si los datos del formulario se enviaron correctamente
        if ($this->request->getMethod() === 'post') {
            // Obtener los datos enviados desde el formulario
            $maquinaData = [
                'fechaAdquisicion' => $this->request->getPost('fechaAdquisicion'),
                'tipo' => $this->request->getPost('tipo'),
                'id_lineaProduccion' => $this->request->getPost('id_lineaProduccion'),
            ];

            // Verificar si la maquina con el ID especificado existe
            $maquinaModel = new MaquinaModel();
            $maquina = $maquinaModel->find($id);
            if (!$maquina) {
                return redirect()->to(site_url('maquina'))->with('error', 'Maquina no encontrado');
            }

            // Validar los datos recibidos del formulario
            $validationRules = [
                'fechaAdquisicion' => 'required',
                'tipo' => 'required',
                'id_lineaProduccion' => 'required',
            ];

            if (!$this->validate($validationRules)) {
                // Si la validación falla, volver a mostrar el formulario de edición con los errores
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Actualizar la maquina en la base de datos
            if (!$maquinaModel->update($id, $maquinaData)) {
                return redirect()->to(site_url('maquina'))->with('error', 'No se pudo actualizar la maquina');
            }

            // Redirigir a la lista de maquinas con un mensaje de éxito
            return redirect()->to(site_url('maquina'))->with('success', 'Maquina actualizada exitosamente');
        }

        // Si la solicitud no es de tipo POST, redirigir a la lista de maquinas
        return redirect()->to(site_url('/dashboard'));
    }

    public function eliminar($id)
    {
        // Cargar el modelo de repartidor
        $maquinaModel = new MaquinaModel();

        // Buscar el repartidor por su ID
        $maquina = $maquinaModel->find($id);

        // Verificar si el repartidor existe
        if (!$maquina) {
            // Redirigir con un mensaje de error si el repartidor no existe
            return redirect()->to(site_url('maquina'))->with('error', 'Maquina no encontrado');
        }

        // Eliminar el repartidor de la base de datos
        $maquinaModel->delete($id);

        // Redirigir a la lista de repartidores con un mensaje de éxito
        return redirect()->to(site_url('maquina'))->with('success', 'Maquina eliminado exitosamente');
    }

    public function generarReporteExcel()
    {
        $model = new MaquinaModel();
        $fileName = 'reporte_maquinas.xlsx';
        $spreadsheet = new Spreadsheet();
        $maquinas = $model->findAll();

        $sheet = $spreadsheet->getActiveSheet();
        

        // Set headers
        $sheet->setCellValue('A1', 'Reporte de Máquinas');
        $sheet->setCellValue('A2', 'ID Máquina');
        $sheet->setCellValue('B2', 'Fecha de Adquisición');
        $sheet->setCellValue('C2', 'Tipo');
        $sheet->setCellValue('D2', 'ID Lína de Producción');

        // Populate data
        $row = 2;
        foreach ($maquinas as $maquina) {
            $sheet->setCellValue('A' . $row, $maquina['id_maquina']);
            $sheet->setCellValue('B' . $row, $maquina['fechaAdquisicion']);
            $sheet->setCellValue('C' . $row, $maquina['tipo']);
            $sheet->setCellValue('D' . $row, $maquina['id_lineaProduccion']);
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
