<?php 

namespace App\Models;

use CodeIgniter\Model;

class CorteTelaModel extends Model
{
    protected $table = 'cortes_tela';
    protected $primaryKey = 'id';

    protected $allowedFields = ['fecha_inicio', 'total_piezas_primeras', 'total_piezas_segundas'];
    
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
