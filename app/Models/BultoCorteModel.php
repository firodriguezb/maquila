<?php 

namespace App\Models;

use CodeIgniter\Model;

class BultoCorteModel extends Model
{
    protected $table = 'bulto_corte';
    protected $primaryKey = 'id_bultoCorte';

    protected $allowedFields = ['nombrePieza', 'nombreBulto', 'numeroPiezas', 'id_corte'];

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
