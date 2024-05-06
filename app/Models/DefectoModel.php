<?php 

namespace App\Models;

use CodeIgniter\Model;

class DefectoModel extends Model
{
    protected $table = 'defectos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descripcion'];

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
