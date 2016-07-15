<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transaction;
use Validator;
use Auth;

class AccountantController extends Controller
{

    public function index()
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }

        $transactions = Transaction::all();
        return view('accountant.index', compact('transactions', 'showroomName'));
    }

    public function show($id)
    {
        $transactionDetail = Transaction::find($id);
        return view('accountant.show', compact('transactionDetail'));
    }

    public function create()
    {

        if(isset(Auth::user()->showroom->name)){
          $showroomName = Auth::user()->showroom->name;
        }else{
          $showroomName = "Belum Ada Izin";
        }

        return view('accountant.create', compact('showroomName'));
    }

    public function store(Request $request)
    {

    }

}
