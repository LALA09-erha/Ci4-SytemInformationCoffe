<?php
namespace App\Models;
use CodeIgniter\Model;

// untuk mengakses database admin di database
Class RatingModel extends Model
{
    protected $table = 'rating';
    protected $primaryKey = 'ID_RATING';
    protected $allowedFields = ['ID_KEDAI', 'NAMA_PENGIRIM', 'NILAI_RATING', 'EMAIL_RATING'];
    protected $useAutoIncrement  = true;
}

?>