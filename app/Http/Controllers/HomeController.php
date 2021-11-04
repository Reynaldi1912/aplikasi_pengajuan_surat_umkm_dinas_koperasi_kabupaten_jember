<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Layanan";
        $path = array("Dashboard");
        $path_link = array(route('home'));
        return view('dashboard',['title'=>$title , 'path'=>$path , 'path_link'=>$path_link]);
    }
    public function form()
    {
        $title = "Pengajuan SKU";
        $path = array("Dashboard","Pengajuan");
        $path_link = array(route('home'),route('form'));
        return view('user.form',['title'=>$title , 'path'=>$path , 'path_link'=>$path_link]);
    }
}
