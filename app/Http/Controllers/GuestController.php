<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Queue;
use Auth;

class GuestController extends Controller
{
    public function layarAntrian($id)
    {
      if(isset(Auth::user()->showroom->name)){
        $queue = Queue::where('showroom_id', $id)->get();
        $showroomName = $queue->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }

      $queues = Queue::where('showroom_id', $id)->whereIn('status', ['Menunggu', 'Dicuci', 'Pengeringan', 'Selesai'])->get();

      $showroom_id = $id;
      // $queues = Queue::all();

      // return Auth::user()->showroom->id;
      return view('guest.layarAntrian', compact('queues', 'showroomName', 'showroom_id'));
    }
}
