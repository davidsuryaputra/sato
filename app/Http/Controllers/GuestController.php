<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Queue;
use App\Showroom;
use Auth;

class GuestController extends Controller
{
    public function layarAntrian($id)
    {

        $showroom = Showroom::find($id);
        $showroomName = $showroom->name;

      $queues = Queue::where('showroom_id', $id)->whereIn('status', ['Menunggu', 'Dicuci', 'Pengeringan', 'Selesai'])->get();

      $showroom_id = $id;

      return view('guest.layarAntrian', compact('queues', 'showroomName', 'showroom_id'));
    }
}
