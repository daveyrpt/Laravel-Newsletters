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
        //$this->middleware('auth'); 1001 delete
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     // 1001 edit
    public function userHome()
    {
        return view('home',["msg"=>"I am user role"]);
    }

    public function editorHome()
    {
        return view('home',["msg"=>"I am Editor role"]);
    }

    public function adminHome()
    {
        return view('home',["msg"=>"I am Admin role"]);
    }
}
