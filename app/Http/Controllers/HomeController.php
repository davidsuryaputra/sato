<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Showroom;
use App\Item;
use App\Transaction;

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
        /*
        if(isset(Auth::user()->showroom->name)){
          $showroomName = Auth::user()->showroom->name;
        }else{
          $showroomName = "Belum Ada Izin";
        }
        */
        $showroomName = User::getShowroom('name');
        $username = Auth::user()->name;
        if($loggedInRole == 'owner'){
          $countShowroom = count(Showroom::all());

          $totalPengeluaran = 0;
          $items = Item::services()->stockable()->get();
          foreach($items as $item){
            $totalPengeluaran += $item->value * $item->stock;
          }

          $totalPendapatan = 0;
          $transactions = Transaction::all();
          foreach($transactions as $transaction){
            $totalPendapatan += $totalPendapatan + $transaction->total;
          }
          return view('owner.home', compact('showroomName', 'username', 'loggedInRole', 'countShowroom', 'totalPengeluaran', 'totalPendapatan'));
        }
        // echo $loggedInRole;
        // return redirect('layarAntrian/1');
        return view("$loggedInRole.home", compact('showroomName', 'username', 'loggedInRole'));
    }
}
