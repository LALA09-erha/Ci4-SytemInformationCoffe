<?php

namespace App\Controllers;

use App\Models\KomenModel;
use App\Models\MenuModel;
class AdminController extends BaseController
{
    //menampilkan halaman contact
    public function index()
    {
        if(session()->get('iduser') && session()->get('idkedai')){
            $komentModel = new KomenModel();
            $menuModel = new MenuModel();

            $kedai = session()->get('kedai');
            $data = [
                'title' => 'Dashboard | Coffee Land',
                'pesan' => $komentModel->where('ID_KEDAI', $kedai['ID_KEDAI'])->findAll(),
                'menu' => $menuModel->where('ID_KEDAI', $kedai['ID_KEDAI'])->findAll(),
                'kedai' => session()->get('kedai'),
            ];
            
            return view('admin/home/dashboard', $data);
        }else{
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata('pesan', 'Anda Harus Login Terlebih Dahulu');
            return redirect()->to('/login');
        }
    }
    
    // menampilkan halaman menu
    
    public function menuKedai()
    {
        if(session()->get('iduser') && session()->get('idkedai')){
            $menuModel = new MenuModel();
            $kedai = session()->get('kedai');
            $data = [
                'title' => 'Data Menu | Coffee Land',
                'menu' => $menuModel->where('ID_KEDAI', $kedai['ID_KEDAI'])->findAll(),
                'kedai' => session()->get('kedai'),
            ];
            return view('admin/home/menu', $data);
        }else{
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata('pesan', 'Anda Harus Login Terlebih Dahulu');
            return redirect()->to('/login');
        }
            
    }

    public function reviewMenu()
    {
        //jika tidak ada session ,send session flashdata
        if(session()->get('iduser') && session()->get('idkedai')){
            $komentModel = new KomenModel();
            $kedai = session()->get('kedai');
            $data = [
                'title' => 'Data Review | Coffee Land',
                'pesan' => $komentModel->where('ID_KEDAI', $kedai['ID_KEDAI'])->findAll(),
                'kedai' => session()->get('kedai'),
            ];
            return view('admin/home/review', $data);
        }else{
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata('pesan', 'Anda Harus Login Terlebih Dahulu');
            return redirect()->to('/login');
        }
    }

    


   
}
