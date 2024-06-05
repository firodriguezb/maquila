<?php 

namespace App\Controllers;

use App\Models\CorteTelaModel;
use App\Models\DefectoModel;
use App\Models\CorteDefectoModel;
use App\Models\CorteModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CorteController extends BaseController
{
    public function registrarDefectos()
    {
        return view('corte-defectos/registro-defectos');
    }

    public function index()
    {
        $model = new CorteModel();
        $data = [
            'cortes' => $model->paginate(10),
            'pager' => $model->pager,
        ];

        return view('cortes/lista', $data);
    }
    
    public function storeDefectos()
    {
        $model = new CorteDefectoModel();
        $data = [
            'id_orden' => $this->request->getPost('fecha'),
            'id_usuario' => $this->request->getPost('corte_id'),
            'defecto_id' => $this->request->getPost('defecto_id'),
            'cantidad_piezas' => $this->request->getPost('cantidad_piezas'),
        ];
        $model->save($data);
        return redirect()->to('cortes');
    }

    public function create()
    {
        return view('cortes/nuevo');
    }

    public function storeNuevo()
    {
        $model = new CorteModel();
        $data = [
            'id_orden' => $this->request->getPost('id_orden'),
            'id_usuario' => $this->request->getPost('id_usuario'),
        ];
        $model->save($data);
        return redirect()->to('cortes');
    }

    public function editar($id)
    {
        $corteModel = new CorteModel();
        $corte = $corteModel->find($id);

        // Pasar los datos del bulto a la vista de edición
        return view('cortes/editar', ['corte' => $corte]);
    }

    public function actualizar($id)
    {
        // Verificar si los datos del formulario se enviaron correctamente
        if ($this->request->getMethod() === 'post') {
            // Obtener los datos enviados desde el formulario
            $corteData = [
                'id_orden' => $this->request->getPost('id_orden'),
                'id_usuario' => $this->request->getPost('id_usuario'),
            ];

            // Verificar si el bulto con el ID especificado existe
            $corteModel = new CorteModel();
            $corte = $corteModel->find($id);
            if (!$corte) {
                return redirect()->to(site_url('cortes'))->with('error', 'Corte no encontrado');
            }

            // Validar los datos recibidos del formulario
            $validationRules = [
                'id_orden' => 'required',
                'id_usuario' => 'required',
            ];

            if (!$this->validate($validationRules)) {
                // Si la validación falla, volver a mostrar el formulario de edición con los errores
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Actualizar el bulto en la base de datos
            if (!$corteModel->update($id, $corteData)) {
                return redirect()->to(site_url('corte/ver-registro'))->with('error', 'No se pudo actualizar el corte');
            }

            // Redirigir a la lista de bultos con un mensaje de éxito
            return redirect()->to(site_url('cortes'))->with('success', 'Corte actualizado exitosamente');
        }

        // Si la solicitud no es de tipo POST, redirigir a la lista de bultos
        return redirect()->to(site_url('/dashboard'));
    }


    public function eliminar($id)
    {
        // Cargar el modelo de corte
        $corteModel = new CorteModel();

        // Buscar el corte por su ID
        $corte = $corteModel->find($id);

        // Verificar si el corte existe
        if (!$corte) {
            // Redirigir con un mensaje de error si el corte no existe
            return redirect()->to(site_url('cortes'))->with('error', 'Corte no encontrado');
        }

        // Eliminar el corte de la base de datos
        $corteModel->delete($id);

        // Redirigir a la lista de repartidores con un mensaje de éxito
        return redirect()->to(site_url('cortes'))->with('success', 'Bulto eliminado exitosamente');
    }

    public function generarReporteExcel()
    {
        $model = new CorteModel();
        $fileName = 'reporte_corte.xlsx';
        $spreadsheet = new Spreadsheet();
        $cortes = $model->findAll();

        $sheet = $spreadsheet->getActiveSheet();
        

        // Set headers
        $sheet->setCellValue('A1', 'Reporte de Cortes');
        $sheet->setCellValue('A2', 'ID Corte');
        $sheet->setCellValue('B2', 'ID Orden');
        $sheet->setCellValue('C2', 'ID Usuario');

        // Populate data
        $row = 3;
        foreach ($cortes as $corte) {
            $sheet->setCellValue('A' . $row, $corte['id_corte']);
            $sheet->setCellValue('B' . $row, $corte['id_orden']);
            $sheet->setCellValue('C' . $row, $corte['id_usuario']);
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
