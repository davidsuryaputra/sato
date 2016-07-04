<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedInRole = Auth::user()->role->name;
        if(isset(Auth::user()->showroom->name)){
          $showroomName = Auth::user()->showroom->name;
        }else{
          $showroomName = "Belum Ada Izin";
        }
        $username = Auth::user()->name;
        return view(''.$loggedInRole.'.home', compact('showroomName', 'username', 'loggedInRole'));
    }
}
