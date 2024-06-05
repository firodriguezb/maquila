<?php 

namespace App\Models;

use CodeIgniter\Model;

class CorteModel extends Model
{
    protected $table = 'corte';
    protected $primaryKey = 'id_corte';

    protected $allowedFields = ['id_orden', 'id_usuario'];

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
}
