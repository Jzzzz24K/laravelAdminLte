<?php

namespace App\Http\Controllers;

use App\Model\Menu;
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

    /**x`
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('index');
    }

    public function home()
    {
        $menus = Menu::where('level',1)->get();
//        foreach($menus as $menu){
//            dump($menu->children);
//        }
        return view('home',compact('menus'));
    }
}
