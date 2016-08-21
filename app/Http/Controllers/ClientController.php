<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Showroom;
use App\Transaction;
use App\TransactionDetail;
use Auth;
use PDF;

class ClientController extends Controller
{
    public function index()
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }

      $transactions = Transaction::where('customer_id', Auth::user()->id)->get();

      // return $transactions;
      return view('client.transaction.index', compact('transactions', 'showroomName'));
    }

    public function show($id)
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }

      $transaction = Transaction::find($id);

      $transactionDetails = TransactionDetail::where('transaction_id', $id)->get();

      // foreach($transaction->details as $item)
      // {
      //   echo $item->sub_total."\n";
      // }

      // return $transaction->details;
      // return $transactionDetails;
      return view('client.transaction.show', compact('transaction', 'transactionDetails', 'showroomName'));
    }

    public function export($id)
    {


      $transaction = Transaction::find($id);

      $transactionDetails = TransactionDetail::where('transaction_id', $id)->get();

      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadView('client.transaction.export', compact('transaction', 'transactionDetails'));
      return $pdf->stream();

    }
}
