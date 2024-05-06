<?php 

namespace App\Models;

use CodeIgniter\Model;

class MaquinaModel extends Model
{
    protected $table = 'maquina';
    protected $primaryKey = 'id';

    protected $allowedFields = ['fechaAdquisicion', 'tipo', 'id_lineaProduccion'];

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
