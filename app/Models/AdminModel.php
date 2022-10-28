<?php
namespace App\Models;
use CodeIgniter\Model;

// untuk mengakses database admin di database
Class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'ID_ADMIN';
    protected $allowedFields = ['email', 'PASSWORD'];
    protected $useAutoIncrement  = true;
}

?>