<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\KomenModel;
use App\Models\KedaiModel;
use App\Models\MenuModel;

// Controller semua page kedai kopi
class KedaiController extends BaseController
{
    // Show all data kedai kopi
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

    // Detail Kedai Kopi
    public function detailKedai($slug){
        $kedaiModel = new KedaiModel();
        $menuModel = new MenuModel();
        $komenModel = new KomenModel();
        // find title from slug
        $kedai = $kedaiModel->where('SLUG', $slug)->first();
        $data = [
            'kedai' => $kedai,
            'menu' => $menuModel->where('ID_KEDAI', $kedai['ID_KEDAI'])->findAll(),
            'komen' => $komenModel->where('ID_KEDAI', $kedai['ID_KEDAI'])->findAll(),
            'title' => $kedai['NAMA_KEDAI'],
        ];
       
        return view('home/single-kedai', $data);
    }

    // Process Review
    public function processReview(){
        $kedaiModel = new KedaiModel();
        $komenModel = new KomenModel();
        $kedai = $kedaiModel->where('ID_KEDAI', $this->request->getVar('id_kedai'))->first();

        // check if email already exist in database komen with id kedai
        $checkEmail = $komenModel->where('EMAIL_KOMENTATOR', $this->request->getVar('email'))->where('ID_KEDAI', $this->request->getVar('id_kedai'))->first();
        if($checkEmail){
            session()->setFlashdata('pesan', 'Email sudah digunakan');
            return redirect()->to('/kedai/'.$kedai['slug']);
        }

        $data = [
            'ID_KEDAI' => $this->request->getVar('id_kedai'),
            'NAMA_KOMENTATOR' => $this->request->getVar('name'),
            'EMAIL_KOMENTATOR' => $this->request->getVar('email'),
            'KOMEN' => $this->request->getVar('komen'),
            'TANGGAL' => date('Y-m-d H:i:s'),
        ];
        $komenModel->insert($data);
        session()->setFlashdata('pesan', 'Komentar berhasil ditambahkan');
        return redirect()->to('/kedai/'.$kedai['slug']);
    }
}
