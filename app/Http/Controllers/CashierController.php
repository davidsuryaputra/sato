<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transaction;
use App\TransactionDetail;
use App\Item;
use App\ItemCategory;
use App\User;
use App\Showroom;
use App\Queue;
use Validator;
use LaravelPusher;
use Auth, Response, Session;
use SnappyPDF;

class CashierController extends Controller
{

  public function antrian()
  {
    if(isset(Auth::user()->showroom->name)){
      $showroomName = Auth::user()->showroom->name;
    }else{
      $showroomName = "Belum Ada Izin";
    }

    $queues = Queue::where('showroom_id', Auth::user()->showroom->id)->where('status', 'Selesai')->get();

    return view('cashier.antrian', compact('showroomName', 'queues'));
  }

  public function antrianShow($id)
  {
    $queue = Queue::find($id);
    return view('cashier.show', compact('queue'));
  }

  //pindahan dari operator
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
      return view('cashier.transaction.index', compact('transactions', 'showroomName'));
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

      return view('cashier.transaction.show', compact('transaction', 'transactionDetails', 'showroomName'));
  }

  public function export($id)
  {

    $transaction = Transaction::find($id);
    $showroom = Showroom::where('id', $transaction->showroom_id)->first();
    $transactionDetails = TransactionDetail::where('transaction_id', $id)->get();


    $pdf = SnappyPDF::loadView('cashier.transaction.export', compact('transaction', 'transactionDetails', 'showroom'));
    $pdf->setPaper('a4');
    return $pdf->inline();
    // return $pdf->download('invoice.pdf');
    /*
    $pdf = App::make('snappy.pdf.wrapper');
    $pdf->loadHTML('<h1>Test</h1>');
    */
    // $pdf = \App::make('dompdf.wrapper');
    // $pdf->loadView('cashier.transaction.export', compact('transaction', 'transactionDetails', 'showroom'));
    // $pdf->loadHTML('<h1>tes</h1>');
    // $pdf->setPaper('a4', 'potrait');
    // $pdf->setWarnings(true);
    // return $pdf->stream();

    // return $pdf->download('x.pdf');

    // return 'hello';
    // return View('cashier.transaction.export', compact('transaction', 'transactionDetails', 'showroom'));

  }

  public function create($id)
  {

      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }

      //do like .add in create blade

      $queue = Queue::findOrFail($id);

      //buat session queue id
      if(is_null(Session::get('queue_id'))){
        Session::put('queue_id', $id);
      }

      //buat customer id session
      if(is_null(Session::get('customer_id')))
      {
        Session::put('customer_id', $queue->customer->id);
      }

      //buat customer name session dari queue id
      if(is_null(Session::get('customer_name')))
      {
        // $customer_name = User::find($request->customer_id)->where('role_id', 5)->first();
        Session::put('customer_name', $queue->customer->name);
      }

      if(is_null(Session::get('no_kendaraan')))
      {
        Session::put('no_kendaraan', $queue->no_kendaraan);
      }

      //ubah db queue jenis ke item_id ubah inputnya juga
      $item = Item::find($queue->item_id);

      $data = [
        'id'     => $item->id,
        'name'   => $item->name,
        'qty'    => 1,
        'price'  => $item->value,
        'amount' => 1 * $item->value,
      ];

      $grandTotal = 0;
      if(is_null(Session::get('items'))){
        Session::push('items', $data);
      }else{
        $oldItems = Session::get('items');
        foreach($oldItems as $key => $value)
        {
            $grandTotal = $grandTotal + $value['amount'];
        }

        if(is_null(Session::get('grandTotal'))){
          Session::put('grandTotal', $grandTotal);
        }
      }

      /*
      return response()->json([
        'success' => true,
        'data'    => $data,
        'grandTotal'  => $grandTotal,
      ]);
      */

      return view('cashier.transaction.create', compact('showroomName', 'queue'));
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

    if(Session::has('no_kendaraan'))
    {
      $no_kendaraan = Session::get('no_kendaraan');
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
      'description' => $no_kendaraan,
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

    if(!is_null(Session::get('queue_id'))){
      $queue = Queue::find(Session::get('queue_id'));
      $queue->status = 'Paid';
      $queue->save();
    }

    Session::forget('items');
    Session::forget('customer_id');
    Session::forget('customer_name');
    Session::forget('no_kendaraan');
    Session::forget('queue_id');
    Session::forget('grandTotal');

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
    $items = Item::whereNotIn('item_category_id', [1])
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
      // $customer_id = "sesi customer id dibuat";
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
    Session::forget('queue_id');
    Session::forget('grandTotal');

    return response()->json([
      'success'  => true,
    ]);
  }
  //end pindahan dari operator

}
