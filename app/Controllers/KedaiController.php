<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\KomenModel;
use App\Models\KedaiModel;
use App\Models\MenuModel;

// Controller semua page kedai kopi
class KedaiController extends BaseController
{
    public function index()
    {
            $kedaiModel = new KedaiModel();
            $data = [
                'kedai' => $kedaiModel->paginate(6, 'kedai'),
                'pager' => $kedaiModel->pager,
                'title' => 'Kedai | Coffee Land'
            ];
            return view('home/kedai', $data);
    }
    public function detailKedai($slug){
        $kedaiModel = new KedaiModel();
        $menuModel = new MenuModel();
        $komenModel = new KomenModel();
        // find title from slug
        $kedai = $kedaiModel->where('SLUG', $slug)->first();
        $data = [
            'kedai' => $kedai,
            'menu' => $menuModel->where('ID_KEDAI', $kedai['ID_KEDAI'])->paginate(4, 'menu'),
            'komen' => $komenModel->where('ID_KEDAI', $kedai['ID_KEDAI'])->paginate(4, 'komen'),
            'title' => $kedai['NAMA_KEDAI'],
        ];
       
        return view('home/single-kedai', $data);
    }
}
