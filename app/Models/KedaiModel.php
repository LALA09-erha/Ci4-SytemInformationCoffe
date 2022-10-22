<?php
namespace App\Models;
use CodeIgniter\Model;

// untuk mengakses database admin di database
Class KedaiModel extends Model
{
    protected $table = 'kedai';
    protected $primaryKey = 'ID_KEDAI';
    protected $allowedFields = ['NAMA_KEDAI', 'DESKRIPSI', 'ALAMAT', 'JAM_TUTUP', 'JAM_BUKA','STATUS', 'NO_TELP',  'FOTO_KEDAI'];
    protected $useAutoIncrement  = true;
}

?>