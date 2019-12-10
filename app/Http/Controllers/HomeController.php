<?php

namespace App\Http\Controllers;

use App\Model\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
        $menus = Auth::user()->getMenus();
//        dump($menus);die;
        return view('home',compact('menus'));
    }

    public function noPermission()
    {
        return view('403');
    }
}
