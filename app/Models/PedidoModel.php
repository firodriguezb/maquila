<?php 
namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id';

    protected $allowedFields = ['cliente_id', 'corte_id', 'cantidad_piezas', 'especificaciones', 'estado'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function getPedidosConDetalles()
    {
        return $this->select('pedidos.*, clientes.nombre as cliente_nombre, cortes.descripcion as corte_descripcion')
                    ->join('clientes', 'clientes.id = pedidos.cliente_id')
                    ->join('cortes', 'cortes.id = pedidos.corte_id')
                    ->findAll();
    }
}
