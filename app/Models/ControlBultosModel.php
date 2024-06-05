<?php 

namespace App\Models;

use CodeIgniter\Model;

class ControlBultosModel extends Model
{
    protected $table = 'control_bultos';
    protected $primaryKey = 'id_controlBultos';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['numeroBulto', 'talla', 'cantidad', 'fecha', 'hora', 'estatus', 'id_operacion', 'id_usuario'];

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