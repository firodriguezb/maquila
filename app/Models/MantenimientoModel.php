<?php

namespace App\Models;

use CodeIgniter\Model;

class MantenimientoModel extends Model
{
    protected $table            = 'mantenimiento';
    protected $primaryKey       = 'id_mantenimiento';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['fecha', 'horaReporte', 'horaEntrega', 'falla', 'actividad', 'id_Usuario', 'id_maquina'];

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