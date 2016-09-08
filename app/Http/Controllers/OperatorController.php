<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transaction;
use App\TransactionDetail;
use App\Item;
use App\ItemCategory;
use App\User;
use App\Queue;
use Validator;
use LaravelPusher;
use Auth, Response, Session;

class OperatorController extends Controller
{
    //client probably unused
    /*
    public function indexClient()
    {
      $clients = User::where('role_id', 5)->where('showroom_id', Auth::user()->showroom_id)->get();

      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }
      // return view('operator.client.index', compact('clients', 'showroomName'));
      return view('operator.real.antrian', compact('clients', 'showroomName'));
    }

    public function editClient($id)
    {
      $client = User::findOrFail($id);
      if(isset(Auth::user()->showroom->name))
      {
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }
      return view('operator.client.edit', compact('client', 'showroomName'));
    }

    public function updateClient(Request $request, $id)
    {
      $this->validate($request, [
        // 'password' => 'required|confirmed|min:5|max:20',
        'title' => 'required',
        'name'  => 'required|max:30',
        'address' => 'required|max:100',
        'city'  => 'required|max:20',
        'phone' => 'required|numeric',
        // 'balance' => 'required|digits_between:5,10',
      ]);

      $client = User::where('id', $id)->where('showroom_id', Auth::user()->showroom_id)
      ->first();

      $client->password = bcrypt($request->password);
      $client->name = $request->title ." ". $request->name;
      $client->address = $request->address;
      $client->city = $request->city;
      $client->phone = $request->phone;
      $client->balance = $request->balance;
      $client->save();

      return redirect()->route('operator.clients.index');
    }

    public function destroyClient($id)
    {
      $client = User::where('id', $id)
        ->where('showroom_id', Auth::user()->showroom_id)
        ->first();

      $client->delete();
      return redirect()->route('operator.clients.index');
    }
    */

    // real operator
    public function terimaPelanggan()
    {

      if(isset(Auth::user()->showroom->name))
      {
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }

      $pricings = Item::where('item_category_id', 3)->get();

      // return view('operator.client.create', compact('showroomName'));
      return view('operator.terimaPelanggan', compact('showroomName', 'pricings'));
    }

    public function clientStore(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email',
        'no_kendaraan' => 'required|max:15',
        'title' => 'required',
        'name' => 'required|max:30',
        'address' => 'required|max:100',
        'city' => 'required|max:20',
        'phone' => 'required|numeric',
        'jenis' => 'required|numeric',
        // 'balance' => 'required|digits_between:1,10',
      ]);

      $client = User::where('email', $request->email)->first();

      if($client != null ){

        $queue = new Queue;
        $queue->customer_id = $client->id;
        $queue->showroom_id = Auth::user()->showroom_id;
        $queue->item_id = $request->jenis;
        $queue->no_kendaraan = $request->no_kendaraan;
        $queue->status = 'Menunggu';
        $queue->save();

        $item = Item::find($request->jenis);
        //pusher notification new queue
        $messages = [
          "id" => $queue->id,
          "customer_id" => Auth::user()->id,
          "showroom_id" => Auth::user()->showroom_id,
          "item_id" => $request->jenis,
          "jenis" => $item->name,
          "no_kendaraan" => $queue->no_kendaraan,
          "status" => 'Menunggu',
        ];
        LaravelPusher::trigger('antrian', 'newAntrian', $messages);

        // $queues = Queue::whereIn('status', ['Menunggu', 'Dicuci', 'Pengeringan'])->get();

        return redirect()->route('operator.antrian');

      }else{

        $client = new User;
        $client->email = $request->email;
        $client->no_kendaraan = $request->no_kendaraan;
        $client->name = $request->title ." ". $request->name;
        $client->address = $request->address;
        $client->city = $request->city;
        $client->phone = $request->phone;
        // $client->balance = $request->balance;
        $client->role_id = 5;
        $client->showroom_id = Auth::user()->showroom_id;
        $client->save();

        $queue = new Queue;
        $queue->customer_id = $client->id;
        $queue->showroom_id = Auth::user()->showroom_id;
        $queue->item_id = $request->jenis;
        $queue->no_kendaraan = $request->no_kendaraan;
        $queue->status = 'Menunggu';
        $queue->save();

        $item = Item::find($request->jenis);
        //pusher notification
        $messages = [
          "id" => $queue->id,
          "customer_id" => Auth::user()->id,
          "showroom_id" => Auth::user()->showroom_id,
          "item_id" => $request->jenis,
          "jenis" => $item->name,
          "no_kendaraan" => $queue->no_kendaraan,
          "status" => 'Menunggu',
        ];
        LaravelPusher::trigger('antrian', 'newAntrian', $messages);

        // $queues = Queue::whereIn('status', ['Menunggu', 'Dicuci', 'Pengeringan'])->get();

        return redirect()->route('operator.antrian');

      }
    }


    public function antrian(){

      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }

      $queues = Queue::where('showroom_id', Auth::user()->showroom->id)->whereIn('status', ['Menunggu', 'Dicuci', 'Pengeringan', 'Selesai'])->get();

      return view('operator.antrian', compact('showroomName', 'queues'));
    }

    public function layarAntrian()
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }

      $queues = Queue::where('showroom_id', Auth::user()->showroom->id)->whereIn('status', ['Menunggu', 'Dicuci', 'Pengeringan', 'Selesai'])->get();

      return view('operator.layarAntrian', compact('queues', 'showroomName'));
    }

    public function updateStatus(Request $request)
    {
      $queue = Queue::where('id', $request->id)->where('showroom_id', Auth::user()->showroom->id)->first();
      $queue->status = $request->status;
      $queue->save();

      //if kasir
      //push ke transaction

      $messages = [
        "id" => $request->id,
        "showroom_id" => Auth::user()->showroom->id,
        "status" => $request->status,
      ];
      LaravelPusher::trigger('antrian', 'updateAntrian', $messages);

      return $messages;
    }

}
