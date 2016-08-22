<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transaction;
use App\TransactionDetail;
use App\Item;
use App\ItemCategory;
use App\User;
use Validator;
use Auth, Response, Session;

class OperatorController extends Controller
{

    //pindahan dari accountant
    public function index()
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }

        $transactions = Transaction::where('showroom_id', Auth::user()->showroom_id)->get();

        /*
        foreach($transactions as $transaction)
        {
          echo $transaction->customer->name."\n";
        }
        */
        // return $transactions;
        return view('operator.transaction.index', compact('transactions', 'showroomName'));
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

        return view('operator.transaction.show', compact('transaction', 'transactionDetails', 'showroomName'));
    }

    public function export($id)
    {


      $transaction = Transaction::find($id);

      $transactionDetails = TransactionDetail::where('transaction_id', $id)->get();

      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadView('operator.transaction.export', compact('transaction', 'transactionDetails'));
      return $pdf->stream();

    }

    public function create()
    {

        if(isset(Auth::user()->showroom->name)){
          $showroomName = Auth::user()->showroom->name;
        }else{
          $showroomName = "Belum Ada Izin";
        }

        return view('operator.transaction.create', compact('showroomName'));
    }

    public function store(Request $request)
    {

      if(Session::has('customer_id'))
      {
        $customer_id = Session::get('customer_id');
      }

      if(Session::has('customer_name'))
      {
        $customer_name = Session::get('customer_name');
      }

      $showroom_id = Auth::user()->showroom_id;
      $operator_id = Auth::user()->id;

      $total = 0;
      $transactionDetailsData = [];
      foreach(Session::get('items') as $item){
        $total = $total + $item['amount'];
        // $transacionDetailData = []
        $transactionDetailsData[] = [
          'item_id' => $item['id'],
          'quantity' => $item['qty'],
          'sub_total' => $item['amount'],
        ];
      }


      $transactionData = [
        'showroom_id' => $showroom_id,
        'customer_id' => $customer_id,
        'operator_id' => $operator_id,
        'total' => $total,
      ];

      // $insertTransaction = new Transaction;
      // $insertTransaction->save($transactionData);

      //cara 1

      $insertTransaction = Transaction::create($transactionData);

      foreach($transactionDetailsData as $item)
      {
        $insertTransaction->details()->save(new TransactionDetail($item));
      }

      Session::forget('items');
      Session::forget('customer_id');
      Session::forget('customer_name');

      return Response::json([
        'success' => true,
      ]);

      //cara 2
      /*
      $insertTransaction = new Transaction;
      $insertTransaction->showroom_id = 1;
      $insertTransaction->customer_id = 5;
      $insertTransaction->operator_id = 3;
      $insertTransaction->total = 104000;
      $insertTransaction->save();

      $insertTransaction->details()->saveMany(array_map(function ($item) {
        return new TransactionDetail($item);
      }, $transactionDetailsData));
      */

    }

    public function autocompleteItem(Request $request)
    {
      $results = array();
      $term = $request->term;
      $items = Item::whereIn('item_category_id', [1, 3])
                ->where('name', 'LIKE', "%$term%")
                ->orWhere('id', 'LIKE', "%$term%")
                ->get();


      foreach($items as $item)
      {
        $results[] = [
          'id' => $item->id,
          'price' => $item->value,
          'value' => $item->name,
        ];
      }

      return Response::json($results);
    }

    public function autocompleteCustomer(Request $request)
    {
      $results = [];
      $term = $request->term;
      $customers = User::where('role_id', 5)
                      ->where('name', 'LIKE', "%$term%")
                      ->get();

      foreach($customers as $customer)
      {
        $results[] = [
          'id' => $customer->id,
          'value' => $customer->name,
        ];
      }

      return response()->json($results);
    }

    public function additem(Request $request)
    {
      $rules = [
        'id'     => 'required',
        'name'   => 'required',
        'qty'    => 'required|numeric',
        'price'  => 'required|numeric',
        'amount' => 'required|numeric',
      ];

      $item = Item::find($request->id);

      $data = [
        'id'     => $item->id,
        'name'   => $item->name,
        'qty'    => $request->qty,
        'price'  => $item->value,
        'amount' => $request->qty * $item->value,
      ];

      $validator = Validator::make($data, $rules);
      if($validator->fails())
      {
        return response()->json([
          'success' => false,
          'errors'  => $validator->errors()->toArray(),
          'is_rules' => 0,
          // 'data'  => $data,
        ]);
      }

      if(!is_null(Session::get('items')))
      {
          $oldItems = Session::get('items');
          $exists = false;
          foreach($oldItems as $key => $value)
          {
            if($request->id == $value['id'])
            {
              $exists = true;
            };
          }

          if($exists)
          {
            return response()->json([
              'errors'  => 'Item '. $request->name . ' has already been taken',
            ]);
          }
      }

      //customer session
      if(is_null(Session::get('customer_name')))
      {
        $customer_name = User::find($request->customer_id)->where('role_id', 5)->first();
        Session::put('customer_name', $customer_name->name);
      }

      //penyakit
      if(is_null(Session::get('customer_id')))
      {
        Session::put('customer_id', $request->customer_id);
        $customer_id = "sesi customer id dibuat";
        // exit;
      }

      Session::push('items', $data);

      $grandTotal = 0;
      $oldItems = Session::get('items');
      foreach($oldItems as $key => $value)
      {
          $grandTotal = $grandTotal + $value['amount'];
      }

      Session::put('grandTotal', $grandTotal);

      return response()->json([
        'success' => true,
        'data'    => $data,
        'grandTotal'  => $grandTotal,
      ]);
    }

    public function deleteitem($id)
    {
      $itemToRemove = $id;
      $items = Session::get('items');
      foreach($items as $key => $value)
      {
        if($value['id'] == $itemToRemove)
        {
          unset($items[$key]);
        }
      }
      Session::put('items', $items);
      return response()->json([
        'success' => true,
        'removedItem' => $itemToRemove,
      ]);

    }

    public function clearitems()
    {
      Session::forget('items');
      Session::forget('customer_name');
      Session::forget('customer_id');

      return response()->json([
        'success'  => true,
      ]);
    }
    //end pindahan dari accountant

    public function indexClient()
    {
      $clients = User::where('role_id', 5)->where('showroom_id', Auth::user()->showroom_id)->get();

      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }
      return view('operator.client.index', compact('clients', 'showroomName'));
    }

    public function createClient()
    {

      if(isset(Auth::user()->showroom->name))
      {
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }
      return view('operator.client.create', compact('showroomName'));
    }

    public function storeClient(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email|unique:users',
        'no_kendaraan' => 'required|max:15',
        'name' => 'required|max:30',
        'address' => 'required|max:100',
        'city' => 'required|max:20',
        'phone' => 'required|numeric',
        // 'balance' => 'required|digits_between:1,10',
      ]);

      $client = new User;
      $client->email = $request->email;
      $client->no_kendaraan = $request->no_kendaraan;
      $client->name = $request->name;
      $client->address = $request->address;
      $client->city = $request->city;
      $client->phone = $request->phone;
      // $client->balance = $request->balance;
      $client->role_id = 5;
      $client->showroom_id = Auth::user()->showroom_id;
      $client->save();

      return redirect()->route('operator.clients.index');
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
        'password' => 'required|confirmed|min:5|max:20',
        'name'  => 'required|max:30',
        'address' => 'required|max:100',
        'city'  => 'required|max:20',
        'phone' => 'required|numeric',
        'balance' => 'required|digits_between:5,10',
      ]);

      $client = User::where('id', $id)->where('showroom_id', Auth::user()->showroom_id)
      ->first();

      $client->password = bcrypt($request->password);
      $client->name = $request->name;
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
}
