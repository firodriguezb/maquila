<?php 

namespace App\Controllers;

use App\Models\ControlBultosModel;
use App\Models\BultoCorteModel;

class BultoCorteController extends BaseController
{
    public function index()
    {
        $model = new BultoCorteModel();
        $data['bultos'] = $model->findAll();

        return view('bultos/lista', $data);
    }

    public function create()
    {
        return view('bultos/nuevo');
    }

    public function store()
    {
        $model = new BultoCorteModel();
        $data = [
            'nombrePieza' => $this->request->getPost('nombrePieza'),
            'nombreBulto' => $this->request->getPost('nombreBulto'),
            'numeroPiezas' => $this->request->getPost('numeroPiezas'),
            'id_corte' => $this->request->getPost('id_corte'),
        ];
        $model->save($data);
        return redirect()->to('/bultos');
    }

    public function editar($id)
    {
        $bultoModel = new BultoCorteModel();
        $bulto = $bultoModel->find($id);

        // Pasar los datos del bulto a la vista de edición
        return view('bultos/editar', ['bulto' => $bulto]);
    }

    public function actualizar($id)
    {
        // Verificar si los datos del formulario se enviaron correctamente
        if ($this->request->getMethod() === 'post') {
            // Obtener los datos enviados desde el formulario
            $bultoData = [
                'nombrePieza' => $this->request->getPost('nombrePieza'),
                'nombreBulto' => $this->request->getPost('nombreBulto'),
                'numeroPiezas' => $this->request->getPost('numeroPiezas'),
                'id_corte' => $this->request->getPost('id_corte'),
            ];

            // Verificar si el bulto con el ID especificado existe
            $bultoModel = new BultoCorteModel();
            $bulto = $bultoModel->find($id);
            if (!$bulto) {
                return redirect()->to(site_url('bultos'))->with('error', 'Bulto no encontrado');
            }

            // Validar los datos recibidos del formulario
            $validationRules = [
                'nombrePieza' => 'required',
                'nombreBulto' => 'required',
                'numeroPiezas' => 'required',
                'id_corte' => 'required',
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
        // Cargar el modelo de repartidor
        $bultoModel = new BultoCorteModel();

        // Buscar el repartidor por su ID
        $bulto = $bultoModel->find($id);

        // Verificar si el repartidor existe
        if (!$bulto) {
            // Redirigir con un mensaje de error si el repartidor no existe
            return redirect()->to(site_url('bultos'))->with('error', 'Bulto no encontrado');
        }

        // Eliminar el repartidor de la base de datos
        $bultoModel->delete($id);

        // Redirigir a la lista de repartidores con un mensaje de éxito
        return redirect()->to(site_url('bultos'))->with('success', 'Bulto eliminado exitosamente');
    }


    public function reporte()
    {
        $model = new BultoCorteModel();
        $data['bultos'] = $model->contarBultosPorEstado();

        return view('bultos/reporte', $data);
    }

}
