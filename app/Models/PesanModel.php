<?php
namespace App\Models;
use CodeIgniter\Model;

// untuk mengakses database admin di database
Class PesanModel extends Model
{
    protected $table = 'pesan';
    protected $primaryKey = 'ID_PESAN';
    protected $allowedFields = ['NAMA_PESAN', 'EMAIL_PESAN','SUBJECT' ,'PESAN','TANGGAL'];
    protected $useAutoIncrement  = true;
}

?>