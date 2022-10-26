<?php

namespace App\Controllers;

use App\Models\KedaiModel;
use App\Models\UserModel;
class SignController extends BaseController
{

    //menampilkan halaman sign in
    public function index()
    {
            $db = \Config\Database::connect();
            $query = $db->query("SELECT * FROM kedai");
            $kedai = $query->getResult();
            $data = [
                'kedai' => $kedai,
                'title' => 'Login | Coffee Land'
            ];
            return view('admin/sign/sign-in', $data);
    }

    //proses sign in
    public function processLogin()
    {
        $userModel = new UserModel();

        //get data from form
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $userModel->where('email', $email)->first();

        //check if email exist
        if ($data) {
            //check if password is correct
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass || $password == $pass) {
                $kedaiModel = new KedaiModel();
                $ses_data = [
                    'iduser' => $data['id_user'],
                    'idkedai' => $data['id_kedai'],
                    'kedai' => $kedaiModel->where('id_kedai', $data['id_kedai'])->first(),
                ];
                session()->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('pesan', 'Login Gagal');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('pesan', 'Login Gagal');
            return redirect()->to('/login');
        }
    }



    //menampilkan halaman sign up
    public function regist()
    {
            $db = \Config\Database::connect();
            $query = $db->query("SELECT * FROM kedai");
            $kedai = $query->getResult();
            $data = [
                'kedai' => $kedai,
                'title' => 'Register | Coffee Land'
            ];
            return view('admin/sign/sign-up', $data);
    }

    public function processRegist()
    {
        $kedaiModel = new KedaiModel();
        $userModel = new UserModel();
        // check if email already exist
        $checkemail = $userModel->where('email', $this->request->getVar('email'))->first();
        
        if($checkemail){
            session()->setFlashdata('pesan', 'Email already exist');
            return redirect()->to('/regist');
        }
        // insert data kedai to Kedai table
        //// make slug and check if slug already exist
        $slug = url_title($this->request->getVar('name'), '-', true);
        if($kedaiModel->where('slug', $slug)->first()){
            $slug = $slug . '-' . time();
        }
        //set data kedai
        $datakedai = [
            'NAMA_KEDAI' => $this->request->getVar('name'),            
            'slug' => $slug,
        ];
        //insert kedai
        $kedaiModel->insert($datakedai);

        // get id kedai
        $kedai = $kedaiModel->where('slug', $slug)->orWhere('NAMA_KEDAI', $this->request->getVar('name'))->first();
            
        //set data user
        //// hash password with
        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        $datauser = [
            'id_kedai' => intval($kedai['ID_KEDAI']),
            'email' => $this->request->getVar('email'),
            'password' => $password
        ];
        // insert data user to User table
        $userModel->insert($datauser);
        session()->setFlashdata('pesan', 'Register Success');
        return redirect()->to('/login');
    }

    //logout
    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('pesan', 'Logout Success');        
        return redirect()->to('/login')->with('pesan', 'Logout Success');
    }
}
