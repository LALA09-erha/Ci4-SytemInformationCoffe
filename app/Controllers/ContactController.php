<?php

namespace App\Controllers;

use App\Models\PesanModel;
class ContactController extends BaseController
{
    //menampilkan halaman contact
    public function index()
    {
            $data = [                
                'title' => 'Contact | Coffee Land'
            ];
            return view('home/contact', $data);
    }

    //proses contact
    public function processContact()
    {
        // check if email already exist in database
        $pesanModel = new PesanModel();
        $checkemail = $pesanModel->where('EMAIL_PESAN', $this->request->getVar('email'))->first();
        if ($checkemail) {
            session()->setFlashdata('pesan', 'Email sudah terdaftar');
            return redirect()->to('/contact');
        }
        
        if($this->request->getVar('subject') =='Open this select menu'){
            session()->setFlashdata('pesan', 'Subject tidak boleh kosong');
            return redirect()->to('/contact');
        }
        
        // insert data to database
        $data = [
            'NAMA_PESAN' => $this->request->getVar('name'),
            'EMAIL_PESAN' => $this->request->getVar('email'),
            'SUBJECT' => $this->request->getVar('subject'),
            'PESAN' => $this->request->getVar('message'),
            'TANGGAL' => date('Y-m-d H:i:s'),
        ];
        $pesanModel->insert($data);
        session()->setFlashdata('pesan', 'Pesan berhasil dikirim');
        return redirect()->to('/contact');
        
    }


   
}
