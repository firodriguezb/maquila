<?php 

namespace App\Models;

use CodeIgniter\Model;

class LineaProduccionModel extends Model
{
    protected $table = 'linea_de_produccion';
    protected $primaryKey = 'id_lineaProduccion';

    protected $allowedFields = ['nombre', 'id_usuario'];

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
