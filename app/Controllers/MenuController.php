<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\KedaiModel;
class MenuController extends BaseController
{
    //menampilkan halaman add menu
    public function index()
    {
        if (session()->get('iduser') && session()->get('idkedai') || session()->get('idadmin')) {
            $kedai = session()->get('kedai');
            $data = [
                'title' => 'Add Menu | Coffee Land',
                'kedai' => $kedai,
            ];
            return view('admin/home/add-menu', $data);
        } else {
            //jika tidak ada session ,send session flashdata
            session()->setFlashdata(
                'pesan',
                'Anda Harus Login Terlebih Dahulu'
            );
            return redirect()->to('/login');
        }
    }

    // proses add menu
    public function processAddMenu()
    {
        if (session()->get('iduser') && session()->get('idkedai') || session()->get('idadmin')) {
            // cek kategori
            $kategori = $this->request->getVar('kategori');
            if ($kategori == '0') {
                session()->setFlashdata(
                    'pesan',
                    'Anda Harus Memilih Kategori Menu'
                );
                return redirect()->to('/add-menu');
            }
            //proses upload gambar
            $file = $this->request->getFile('gambarmenu');
            if ($file->isValid() && !$file->hasMoved()) {
                $idkedai = session()->get('idkedai');
                $kedaiModel = new KedaiModel();
                $kedai = $kedaiModel->find($idkedai);

                $namafile = $file->getName();
                $ext = $file->getClientExtension();
                if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
                    $namafilebaru = $kedai['ID_KEDAI'] . ' ' . $namafile;
                    // cek apakah file sudah ada
                    if (file_exists('imgmenu/' . $namafilebaru)) {
                        $namafilebaru =
                            $kedai['ID_KEDAI'] . ' ' . time() . ' ' . $namafile;
                    }
                    $file->move('imgmenu', $namafilebaru);
                    $menuModel = new MenuModel();
                    $harga = $this->request->getVar('harga');

                    $data = [
                        'ID_KEDAI' => session()->get('idkedai'),
                        'NAMA_MENU' => $this->request->getVar('namamenu'),
                        'ID_KATEGORI' => $this->request->getVar('kategori'),
                        'HARGA' => $harga,
                        'FOTO_MENU' => $namafilebaru,
                    ];
                    $menuModel->insert($data);
                    session()->setFlashdata(
                        'pesan',
                        'Menu Berhasil Ditambahkan'
                    );
                    return redirect()->to('/menu');
                } else {
                    session()->setFlashdata(
                        'pesan',
                        'Format Gambar Tidak Didukung'
                    );
                    return redirect()->to('/menu');
                }
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

    //menampilkan halaman edit menu
    public function editMenu($idmenu)
    {
        if (session()->get('iduser') && session()->get('idkedai') || session()->get('idadmin')) {
            $menuModel = new MenuModel();
            //cek apakah session idkedai sama dengan idkedai di menu

            $menu = $menuModel->where('ID_MENU', $idmenu)->first();
            if ($menu['ID_KEDAI'] == session()->get('idkedai')) {
                $data = [
                    'title' => 'Edit Menu | Coffee Land',
                    'menu' => $menu,
                ];
                return view('admin/home/edit-menu', $data);
            } else {
                session()->setFlashdata(
                    'pesan',
                    'Anda Tidak Memiliki Akses Untuk Menu Ini'
                );
                return redirect()->to('/menu');
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

    //proses edit menu
    public function processEditMenu()
    {
        if (session()->get('iduser') && session()->get('idkedai') || session()->get('idadmin')) {
            // dd($this->request->getFile('gambarmenu')->getError());
            $menuModel = new MenuModel();            
            $idmenu = $this->request->getVar('idmenu');
            // cek apakah session idkedai sama dengan idkedai di menu
            $menu = $menuModel->where('ID_MENU', $idmenu)->first();
            if ($menu['ID_KEDAI'] == session()->get('idkedai')) {
                // check has the data been changed
                if(
                    $menu['NAMA_MENU'] == $this->request->getVar('namamenu') &&
                    $menu['ID_KATEGORI'] == $this->request->getVar('kategori') &&
                    $menu['HARGA'] == $this->request->getVar('harga') &&
                    $this->request->getFile('gambarmenu')->getError() == 4
                ){
                    session()->setFlashdata(
                        'pesan',
                        'Data Tidak Berubah'
                    );
                    return redirect()->to('/menu');
                }
                else{
                    // cek kategori
                    $kategori = $this->request->getVar('kategori');
                    if ($kategori == '0') {
                        session()->setFlashdata(
                            'pesan',
                            'Anda Harus Memilih Kategori Menu'
                        );
                        return redirect()->to('/editmenu/'.$idmenu);
                    }
                    else{
                        //proses upload gambar
                        $file = $this->request->getFile('gambarmenu');
                        if ($file->isValid() && !$file->hasMoved()) {
                            $idkedai = session()->get('idkedai');
                            $kedaiModel = new KedaiModel();
                            $kedai = $kedaiModel->find($idkedai);
    
                            $namafile = $file->getName();
                            $ext = $file->getClientExtension();
                            if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
                                $namafilebaru = $kedai['ID_KEDAI'] . ' ' . $namafile;
                                // cek apakah file sudah ada jika sudah hapus file lama
                                if (file_exists('imgmenu/' . $menu['FOTO_MENU'])) {
                                    unlink('imgmenu/'.$menu['FOTO_MENU']);
                                    $file->move('imgmenu', $namafilebaru);
                                }
                                $harga = $this->request->getVar('harga');
    
                                $data = [
                                    'NAMA_MENU' => $this->request->getVar('namamenu'),
                                    'ID_KATEGORI' => $this->request->getVar('kategori'),
                                    'HARGA' => $harga,
                                    'FOTO_MENU' => $namafilebaru,
                                ];
                                $menuModel->update($idmenu,$data);
                                session()->setFlashdata(
                                    'pesan',
                                    'Menu Berhasil Diubah'
                                );
                                return redirect()->to('/menu');
                            } else {
                                session()->setFlashdata(
                                    'pesan',
                                    'Format Gambar Tidak Didukung'
                                );
                                return redirect()->to('/menu');
                            }
                        }
                        else{
                            $harga = $this->request->getVar('harga');
    
                            $data = [
                                'NAMA_MENU' => $this->request->getVar('namamenu'),
                                'ID_KATEGORI' => $this->request->getVar('kategori'),
                                'HARGA' => $harga,
                            ];
                            $menuModel->update($idmenu,$data);
                            session()->setFlashdata(
                                'pesan',
                                'Menu Berhasil Diubah'
                            );
                            return redirect()->to('/menu');
                        }
                    }
                }
            }else{
                session()->setFlashdata(
                    'pesan',
                    'Anda Tidak Memiliki Akses Untuk Menu Ini'
                );
                return redirect()->to('/menu');
            }
        }
    }

    //proses hapus menu
    public function deleteMenu($idmenu)
    {
        if (session()->get('iduser') && session()->get('idkedai') || session()->get('idadmin')) {
            $menuModel = new MenuModel();
            $menu = $menuModel->where('ID_MENU', $idmenu)->first();
            if ($menu['ID_KEDAI'] == session()->get('idkedai') || session()->get('idadmin')) {
                $menuModel->delete($idmenu);
                session()->setFlashdata(
                    'pesan',
                    'Menu Berhasil Dihapus'
                );
                return redirect()->to('/menu');
            } else {
                session()->setFlashdata(
                    'pesan',
                    'Anda Tidak Memiliki Akses Untuk Menu Ini'
                );
                return redirect()->to('/menu');
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
}
