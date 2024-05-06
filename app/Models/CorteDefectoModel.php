<?php 

namespace App\Models;

use CodeIgniter\Model;

class CorteDefectoModel extends Model
{
    protected $table = 'cortes_defectos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['corte_id', 'defecto_id', 'cantidad_piezas'];

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
