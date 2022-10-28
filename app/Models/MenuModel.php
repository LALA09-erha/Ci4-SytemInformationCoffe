<?php
namespace App\Models;
use CodeIgniter\Model;

// untuk mengakses database admin di database
Class MenuModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'ID_MENU';
    protected $allowedFields = ['ID_KEDAI', 'ID_KATEGORI', 'NAMA_MENU', 'HARGA','FOTO_MENU'];
    protected $useAutoIncrement  = true;
}

?>