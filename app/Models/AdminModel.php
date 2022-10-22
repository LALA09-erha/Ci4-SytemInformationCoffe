<?php
namespace App\Models;
use CodeIgniter\Model;

// untuk mengakses database admin di database
Class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'ID_ADMIN';
    protected $allowedFields = ['USERNAME', 'PASSWORD'];
    protected $useAutoIncrement  = true;
}

?>