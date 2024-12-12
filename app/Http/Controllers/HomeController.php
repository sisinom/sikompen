<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Selamat Datang',
            'list' => ['Home', 'Welcome']
        ];

        $activeMenu = 'dashboard';

        return view('home', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
}
