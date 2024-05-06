<?php 

namespace App\Models;

use CodeIgniter\Model;

class BultoModel extends Model
{
    protected $table = 'bultos';
    protected $primaryKey = 'id';

    protected $allowedFields = ['descripcion', 'estado', 'fecha_revision'];

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
    
    public function contarBultosPorEstado()
    {
        return $this->select('estado, COUNT(*) as total')
                    ->groupBy('estado')
                    ->findAll();
    }
}
