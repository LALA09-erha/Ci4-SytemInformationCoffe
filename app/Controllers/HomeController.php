<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\KomenModel;
use App\Models\KedaiModel;
use App\Models\MenuModel;
class HomeController extends BaseController
{

    //menampilkan halaman home
    public function index()
    {
            $db = \Config\Database::connect();
            $query = $db->query("SELECT * FROM kedai");
            $kedai = $query->getResult();
            $data = [
                'kedai' => $kedai,
                'title' => 'Home | Coffee Land'
            ];
            return view('home/home', $data);
    }

   

    //menampilkan hasil pencarian kedai
    public function searchKedai()
    {
        $kedaiModel = new KedaiModel();
        $search = $this->request->getVar('search');
        $kedai = $kedaiModel->like('NAMA_KEDAI', $search)->orLike('DESKRIPSI', $search)->paginate(6, 'kedai');
        $data = [
            'kedai' => $kedai,
            'pager' => $kedaiModel->pager,
            'title' => 'Home | Coffee Land'
        ];
        
        return view('home/cari-kedai', $data);
    }
}
