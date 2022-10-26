<?php
namespace App\Models;
use CodeIgniter\Model;

// untuk mengakses database admin di database
Class KomenModel extends Model
{
    protected $table = 'komen';
    protected $primaryKey = 'ID_KOMEN';
    protected $allowedFields = ['ID_KEDAI', 'NAMA_KOMENTATOR', 'EMAIL_KOMENTATOR','KOMEN','TANGGAL'];
    protected $useAutoIncrement  = true;
}

?>