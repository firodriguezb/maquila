<?php 

namespace App\Controllers;

use App\Models\ControlBultosModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ControlBultosController extends BaseController
{
    public function index()
    {
        $model = new ControlBultosModel();
        // Configurar la paginación
        $data = [
            'bultos' => $model->paginate(10),
            'pager' => $model->pager,
        ];

        return view('control_bultos/lista', $data);
    }

    public function create()
    {
        return view('control_bultos/nuevo');
    }

    public function store()
    {
        $model = new ControlBultosModel();
        $data = [
            'numeroBulto' => $this->request->getPost('numeroBulto'),
            'talla' => $this->request->getPost('talla'),
            'cantidad' => $this->request->getPost('cantidad'),
            'fecha' => $this->request->getPost('fecha'),
            'hora' => $this->request->getPost('hora'),
            'estatus' => $this->request->getPost('estatus'),
            'id_operacion' => $this->request->getPost('id_operacion'),
            'id_usuario' => $this->request->getPost('id_usuario'),
        ];
        $model->save($data);
        return redirect()->to('/bultos');
    }

    public function editar($id)
    {
        $bultoModel = new ControlBultosModel();
        $bulto = $bultoModel->find($id);

        // Pasar los datos del bulto a la vista de edición
        return view('control_bultos/editar', ['bulto' => $bulto]);
    }

    public function actualizar($id)
    {
        // Verificar si los datos del formulario se enviaron correctamente
        if ($this->request->getMethod() === 'post') {
            // Obtener los datos enviados desde el formulario
            $bultoData = [
                'numeroBulto' => $this->request->getPost('numeroBulto'),
                'talla' => $this->request->getPost('talla'),
                'cantidad' => $this->request->getPost('cantidad'),
                'fecha' => $this->request->getPost('fecha'),
                'hora' => $this->request->getPost('hora'),
                'estatus' => $this->request->getPost('estatus'),
                'id_operacion' => $this->request->getPost('id_operacion'),
                'id_usuario' => $this->request->getPost('id_usuario'),
            ];

            // Verificar si el bulto con el ID especificado existe
            $bultoModel = new ControlBultosModel();
            $bulto = $bultoModel->find($id);
            if (!$bulto) {
                return redirect()->to(site_url('bultos'))->with('error', 'Bulto no encontrado');
            }

            // Validar los datos recibidos del formulario
            $validationRules = [
                'numeroBulto' => 'required',
                'talla' => 'required',
                'cantidad' => 'required',
                'fecha' => 'required',
                'hora' => 'required',
                'estatus' => 'required',
                'id_operacion' => 'required',
                'id_usuario' => 'required',
            ];

            if (!$this->validate($validationRules)) {
                // Si la validación falla, volver a mostrar el formulario de edición con los errores
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Actualizar el bulto en la base de datos
            if (!$bultoModel->update($id, $bultoData)) {
                return redirect()->to(site_url('bultos'))->with('error', 'No se pudo actualizar el bulto');
            }

            // Redirigir a la lista de bultos con un mensaje de éxito
            return redirect()->to(site_url('bultos'))->with('success', 'Bulto actualizado exitosamente');
        }

        // Si la solicitud no es de tipo POST, redirigir a la lista de bultos
        return redirect()->to(site_url('/dashboard'));
    }


    public function eliminar($id)
    {
        $bultoModel = new ControlBultosModel();

        $bulto = $bultoModel->find($id);

        if (!$bulto) {
            return redirect()->to(site_url('bultos'))->with('error', 'Bulto no encontrado');
        }

        $bultoModel->delete($id);

        return redirect()->to(site_url('bultos'))->with('success', 'Bulto eliminado exitosamente');
    }

    public function generarReporteExcel()
    {
        $model = new ControlBultosModel();
        $fileName = 'reporte_bultos.xlsx';
        $spreadsheet = new Spreadsheet();
        $bultos = $model->findAll();

        $sheet = $spreadsheet->getActiveSheet();
        

        // Set headers
        $sheet->setCellValue('A1', 'Reporte de Bultos');
        $sheet->setCellValue('A2', 'ID Bulto');
        $sheet->setCellValue('B2', 'Número de Bulto');
        $sheet->setCellValue('C2', 'Talla');
        $sheet->setCellValue('D2', 'Cantidad');
        $sheet->setCellValue('E2', 'Fecha');
        $sheet->setCellValue('F2', 'Hora');
        $sheet->setCellValue('G2', 'Estatus');
        $sheet->setCellValue('H2', 'ID Operación');
        $sheet->setCellValue('I2', 'ID Usuario');

        // Populate data
        $row = 3;
        foreach ($bultos as $bulto) {
            $sheet->setCellValue('A' . $row, $bulto['id_controlBultos']);
            $sheet->setCellValue('B' . $row, $bulto['numeroBulto']);
            $sheet->setCellValue('C' . $row, $bulto['talla']);
            $sheet->setCellValue('D' . $row, $bulto['cantidad']);
            $sheet->setCellValue('E' . $row, $bulto['fecha']);
            $sheet->setCellValue('F' . $row, $bulto['hora']);
            $sheet->setCellValue('G' . $row, $bulto['estatus']);
            $sheet->setCellValue('H' . $row, $bulto['id_operacion']);
            $sheet->setCellValue('I' . $row, $bulto['id_usuario']);
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
