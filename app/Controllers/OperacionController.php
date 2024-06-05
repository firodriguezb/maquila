<?php 

namespace App\Controllers;

use App\Models\OperacionModel;

class OperacionController extends BaseController
{
    public function index()
    {
        $model = new OperacionModel();
        
        $data = [
            'operaciones' => $model->paginate(10),
            'pager' => $model->pager,
        ];

        return view('operacion/lista', $data);
    }

    public function create()
    {
        return view('operacion/nuevo');
    }

    public function store()
    {
        $model = new OperacionModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'id_ordenProduccion' => $this->request->getPost('id_ordenProduccion'),
        ];
        $model->save($data);
        return redirect()->to('/operacion');
    }

    public function editar($id)
    {
        $operacionModel = new OperacionModel();
        $operacion = $operacionModel->find($id);

        // Pasar los datos de la operacion a la vista de edición
        return view('operacion/editar', ['operacion' => $operacion]);
    }

    public function actualizar($id)
    {
        // Verificar si los datos del formulario se enviaron correctamente
        if ($this->request->getMethod() === 'post') {
            // Obtener los datos enviados desde el formulario
            $operacionData = [
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion'),
                'id_ordenProduccion' => $this->request->getPost('id_ordenProduccion'),
            ];

            // Verificar si la operacion con el ID especificado existe
            $operacionModel = new OperacionModel();
            $operacion = $operacionModel->find($id);
            if (!$operacion) {
                return redirect()->to(site_url('operacion'))->with('error', 'Operacion no encontrada');
            }

            // Validar los datos recibidos del formulario
            $validationRules = [
                'nombre' => 'required',
                'descripcion' => 'required',
                // 'id_ordenProduccion' => 'required',
            ];

            if (!$this->validate($validationRules)) {
                // Si la validación falla, volver a mostrar el formulario de edición con los errores
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Actualizar la operacion en la base de datos
            if (!$operacionModel->update($id, $operacionData)) {
                return redirect()->to(site_url('operacion'))->with('error', 'No se pudo actualizar la operación');
            }

            // Redirigir a la lista de operaciones con un mensaje de éxito
            return redirect()->to(site_url('operacion'))->with('success', 'Operación actualizada exitosamente');
        }

        // Si la solicitud no es de tipo POST, redirigir a la lista de operaciones
        return redirect()->to(site_url('/dashboard'));
    }


    public function eliminar($id)
    {
        // Cargar el modelo de operacion
        $operacionModel = new OperacionModel();

        // Buscar la operacion por su ID
        $operacion = $operacionModel->find($id);

        // Verificar si la operacion existe
        if (!$operacion) {
            // Redirigir con un mensaje de error si la operacion no existe
            return redirect()->to(site_url('operacion'))->with('error', 'Operacion no encontrada');
        }

        // Eliminar la operacion de la base de datos
        $operacionModel->delete($id);

        // Redirigir a la lista de operaciones con un mensaje de éxito
        return redirect()->to(site_url('operacion'))->with('success', 'Operación eliminada exitosamente');
    }
}
