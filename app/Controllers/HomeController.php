<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\KomenModel;
use App\Models\KedaiModel;
use App\Models\MenuModel;
class HomeController extends BaseController
{
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

   
}
