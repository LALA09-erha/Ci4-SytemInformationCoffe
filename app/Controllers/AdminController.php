<?php

namespace App\Controllers;

use App\Models\KomenModel;
use App\Models\MenuModel;
use App\Models\KedaiModel;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\PesanModel;

class AdminController extends BaseController
{
    //menampilkan halaman contact
    public function index()
    {
        if (
            (session()->get('iduser') && session()->get('idkedai')) ||
            session()->get('idadmin')
        ) {
            $komentModel = new KomenModel();
            $menuModel = new MenuModel();
            if (session()->get('idadmin')) {
                $kedaiModel = new KedaiModel();
                $data = [
                    'title' => 'Dashboard | Coffee Land',
                    'pesan' => $komentModel->findAll(),
                    'menu' => $menuModel->findAll(),
                    'kedai' => $kedaiModel->findAll(),
                ];
            } else {
                $kedai = session()->get('kedai');
                $data = [
                    'title' => 'Dashboard | Coffee Land',
                    'pesan' => $komentModel
                        ->where('ID_KEDAI', $kedai['ID_KEDAI'])
                        ->findAll(),
                    'menu' => $menuModel
                        ->where('ID_KEDAI', $kedai['ID_KEDAI'])
                        ->findAll(),
                    'kedai' => session()->get('kedai'),
                ];
            }
            return view('admin/home/dashboard', $data);
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    // menampilkan halaman menu

    public function menuKedai()
    {
        if (
            (session()->get('iduser') && session()->get('idkedai')) ||
            session()->get('idadmin')
        ) {
            $menuModel = new MenuModel();
            $kedai = session()->get('kedai');
            if (session()->get('idadmin')) {
                $kedaiModel = new KedaiModel();
                $data = [
                    'title' => 'Data Menu | Coffee Land',
                    'menu' => $menuModel->findAll(),
                    'kedai' => $kedaiModel->findAll(),
                ];
            } else {
                $data = [
                    'title' => 'Data Menu | Coffee Land',
                    'menu' => $menuModel
                        ->where('ID_KEDAI', $kedai['ID_KEDAI'])
                        ->findAll(),
                    'kedai' => session()->get('kedai'),
                ];
            }
            return view('admin/home/menu', $data);
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    // menampilkan halaman review
    public function reviewMenu()
    {
        //jika tidak ada session ,send session flashdata
        if (
            (session()->get('iduser') && session()->get('idkedai')) ||
            session()->get('idadmin')
        ) {
            $komentModel = new KomenModel();
            $kedai = session()->get('kedai');
            if (session()->get('idadmin')) {
                $kedaiModel = new KedaiModel();
                $data = [
                    'title' => 'Data Review | Coffee Land',
                    'pesan' => $komentModel->findAll(),
                    'kedai' => $kedaiModel->findAll(),
                ];
            } else {
                $data = [
                    'title' => 'Data Review | Coffee Land',
                    'pesan' => $komentModel
                        ->where('ID_KEDAI', $kedai['ID_KEDAI'])
                        ->findAll(),
                    'kedai' => session()->get('kedai'),
                ];
            }
            return view('admin/home/review', $data);
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    //menampilkan halaman change info
    public function changeInfo()
    {
        if (
            (session()->get('iduser') && session()->get('idkedai')) ||
            session()->get('idadmin')
        ) {
            $kedai = session()->get('kedai');
            $data = [
                'title' => 'Info | Coffee Land',
                'kedai' => $kedai,
            ];
            return view('admin/home/change-info', $data);
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    //proses update info kedai
    public function processInfo()
    {
        if (
            (session()->get('iduser') && session()->get('idkedai')) ||
            session()->get('idadmin')
        ) {
            $kedai = session()->get('kedai');
            // check Has the data changed?
            if (
                $this->request->getVar('name') == $kedai['NAMA_KEDAI'] &&
                $this->request->getVar('alamat') == $kedai['ALAMAT'] &&
                $this->request->getVar('deskripsi') == $kedai['DESKRIPSI'] &&
                $this->request->getVar('telepon') == $kedai['TELP'] &&
                $this->request->getVar('jambuka') == '' &&
                $this->request->getVar('jamtutup') == ''
            ) {
                session()->setFlashdata('pesan', 'Data Tidak Berubah');
                return redirect()->to('/dashboard');
            } else {
                if (
                    $this->request->getVar('jambuka') == '' &&
                    $this->request->getVar('jamtutup') == ''
                ) {
                    $jambuka = $kedai['JAM_BUKA'];
                    $jamtutup = $kedai['JAM_TUTUP'];
                } else {
                    $jambuka = $this->request->getVar('jambuka');
                    $jamtutup = $this->request->getVar('jamtutup');
                }

                $data = [
                    'NAMA_KEDAI' => $this->request->getVar('name'),
                    'ALAMAT' => $this->request->getVar('alamat'),
                    'TELP' => $this->request->getVar('telepon'),
                    'JAM_BUKA' => $jambuka,
                    'JAM_TUTUP' => $jamtutup,
                    'DESKRIPSI' => $this->request->getVar('deskripsi'),
                ];
                // update kedai
                $kedaiModel = new KedaiModel();
                $kedaiModel->update($kedai['ID_KEDAI'], $data);
                session()->setFlashdata('pesan', 'Data Berhasil Diubah');
                // update session kedai
                $kedai = $kedaiModel->find($kedai['ID_KEDAI']);
                session()->set('kedai', $kedai);
                return redirect()->to('/dashboard');
            }
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    //memproses change foto kedai
    public function uploadImage()
    {
        if (
            (session()->get('iduser') && session()->get('idkedai')) ||
            session()->get('idadmin')
        ) {
            $kedai = session()->get('kedai');
            $file = $this->request->getFile('gambarcafe');

            //cek apakah  file yang diupload adalah gambar
            if ($file->isValid() && !$file->hasMoved()) {
                //ambil nama file
                $namaFile = $file->getName();
                //ambil ekstensi file
                $ekstensi = $file->getClientExtension();
                //cek apakah ekstensi file adalah gambar
                if (
                    $ekstensi == 'jpg' ||
                    $ekstensi == 'png' ||
                    $ekstensi == 'jpeg'
                ) {
                    //generate nama file baru
                    $namaFileBaru = $kedai['ID_KEDAI'] . ' ' . $namaFile;
                    if (file_exists('imgcafe/' . $kedai['FOTO_KEDAI'])) {
                        //jika ada file lama hapus file lama dan upload file baru
                        unlink('imgcafe/' . $kedai['FOTO_KEDAI']);
                        //pindahkan file ke folder img
                        $file->move('imgcafe', $namaFileBaru);
                    }

                    //update nama file kedai
                    $kedaiModel = new KedaiModel();
                    $kedaiModel->update($kedai['ID_KEDAI'], [
                        'FOTO_KEDAI' => $namaFileBaru,
                    ]);
                    //update session kedai
                    $kedai = $kedaiModel->find($kedai['ID_KEDAI']);
                    session()->set('kedai', $kedai);
                    session()->setFlashdata('pesan', 'Foto Berhasil Diubah');
                    return redirect()->to('/dashboard');
                } else {
                    session()->setFlashdata(
                        'pesan',
                        'Ekstensi File Tidak Didukung'
                    );
                    return redirect()->to('/dashboard');
                }
            } else {
                session()->setFlashdata('pesan', 'File Tidak Valid');
                return redirect()->to('/dashboard');
            }
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    // SUPER ADMIN AREA
    // menampilkan halaman data cafe
    public function datacafe()
    {
        if (session()->get('idadmin')) {
            $kedaiModel = new KedaiModel();
            $userModel = new UserModel();
            $data = [
                'title' => 'Data Cafes | Coffee Land',
                'kedai' => $kedaiModel->findAll(),
                'user' => $userModel->findAll(),
            ];
            return view('admin/home/datacafe', $data);
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    //proses hapus review
    public function deleteReview($id)
    {
        if (session()->get('idadmin')) {
            $komentModel = new KomenModel();
            $komentModel->delete($id);
            session()->setFlashdata('pesan', 'Review Berhasil Dihapus');
            return redirect()->to('/review');
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    //proses hapus cafe
    public function deleteCafe($id)
    {
        if (session()->get('idadmin')) {
            $kedaiModel = new KedaiModel();
            $userModel = new UserModel();
            $komentModel = new KomenModel();
            $menuModel = new MenuModel();

            //cari user berdasarkan id kedai
            $user = $userModel->where('ID_KEDAI', $id)->first();
            //cari menu berdasarkan id kedai
            $menu = $menuModel->where('ID_KEDAI', $id)->findAll();
            //cari komentar berdasarkan id kedai
            $koment = $komentModel->where('ID_KEDAI', $id)->findAll();

            //hapus foto kedai
            if (file_exists('imgcafe/' . $kedaiModel->find($id)['FOTO_KEDAI'])) {
                unlink('imgcafe/' . $kedaiModel->find($id)['FOTO_KEDAI']);
            }
            //hapus foto menu
            foreach ($menu as $m) {
                if (file_exists('imgmenu/' . $m['FOTO_MENU'])) {
                    unlink('imgmenu/' . $m['FOTO_MENU']);
                }
            }
            

            $menuModel->where('ID_KEDAI', $id)->delete();
            $komentModel->where('ID_KEDAI', $id)->delete();

            $userModel->delete($user['id_user']);
            $kedaiModel->delete($id);

            session()->setFlashdata('pesan', 'Cafe Berhasil Dihapus');
            return redirect()->to('/data-cafe');
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    // menampilkan halaman adminMenu
    public function adminMenu()
    {
        if (session()->get('idadmin')) {
            $adminModel = new AdminModel();
            $data = [
                'title' => 'Admin | Coffee Land',
                'admin' => $adminModel->findAll(),
            ];
            return view('admin/home/dataadmin', $data);
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    // proses delete admin
    public function deleteAdmin($id)
    {
        if (session()->get('idadmin')) {
            $adminModel = new AdminModel();
            $adminModel->delete($id);
            session()->setFlashdata('pesan', 'Admin Berhasil Dihapus');
            return redirect()->to('/admin');
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    // menampilkan halaman tambah admin
    public function addAdmin()
    {
        if (session()->get('idadmin')) {
            $data = [
                'title' => 'Tambah Admin | Coffee Land',
                'validation' => \Config\Services::validation(),
            ];
            return view('admin/home/tambahadmin', $data);
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    // proses tambah admin
    public function processAddAdmin()
    {
        if(session()->get('idadmin'))
        {
            //cek apakah email sudah terdaftar
            $adminModel = new AdminModel();
            $email = $this->request->getVar('email');
            $cekEmail = $adminModel->where('email', $email)->first();
            if($cekEmail){
                session()->setFlashdata('pesan', 'Email Sudah Terdaftar');
                return redirect()->to('/tambah-admin');
            }
            else{
                //enkripsi password
                $password = $this->request->getVar('password');
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $data = [
                    'email' => $email,
                    'PASSWORD' => $passwordHash,
                ];
                $adminModel->insert($data);
                session()->setFlashdata('pesan', 'Admin Berhasil Ditambahkan');
                return redirect()->to('/admin');

            }
        }
    }

    // menampilkan halaman message
    public function message()
    {
        if (session()->get('idadmin')) {
            $pesanModel = new PesanModel();
            $data = [
                'title' => 'Data Message | Coffee Land',
                'pesan' => $pesanModel->findAll(),
            ];
            return view('admin/home/pesanToadmin', $data);
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    // proses delete all message
    public function deleteMessage()
    {
        if (session()->get('idadmin')) {
            $pesanModel = new PesanModel();
            $pesanModel->emptyTable('pesan');
            session()->setFlashdata('pesan', 'Semua Pesan Berhasil Dihapus');
            return redirect()->to('/message');
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }
}
