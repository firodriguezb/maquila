<?php 

namespace App\Models;

use CodeIgniter\Model;

class OperacionModel extends Model
{
    protected $table = 'operacion';
    protected $primaryKey = 'id_operacion';

    protected $allowedFields = ['nombre', 'descripcion', 'id_ordenProduccion'];

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
