<?php
namespace App\Models;
use CodeIgniter\Model;

// untuk mengakses database admin di database
Class KategoriModel extends Model
{
    protected $table = 'kategori_menu';
    protected $primaryKey = 'ID_KATEGORI';
    protected $allowedFields = ['NAMA_KATEGORI'];
    protected $useAutoIncrement  = true;
}

?>