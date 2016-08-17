<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Showroom;
use App\User;
use App\Role;
use App\Item;
use App\ItemCategory;
use Auth;
use Validator;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEmployee()
    {
        $employees = User::whereIn('role_id', [3, 4])
          ->where('showroom_id', '=', Auth::user()->showroom_id)->get();
        if(isset(Auth::user()->showroom->name)){
          $showroomName = Auth::user()->showroom->name;
        }else{
          $showroomName = "Belum Ada Izin";
        }
        return view('manager.employees.index', compact('employees', 'showroomName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEmployee()
    {
        if(isset(Auth::user()->showroom->name)){
          $showroomName = Auth::user()->showroom->name;
        }else{
          $showroomName = "Belum Ada Izin";
        }

        return view('manager.employees.create', compact('showroomName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEmployee(Request $request)
    {
        $this->validate($request, [
          'email' => 'required|email|unique:users',
          'password' => 'required|confirmed|min:5|max:20',
          'name' => 'required|max:30',
          'address' => 'required|max:100',
          'city'  => 'required|max:20',
          'phone' => 'required|numeric',
          'balance' => 'required|digits_between:5,10',
          'role'  => 'required|numeric',
        ]);

        $employee = new User;
        $employee->email = $request->email;
        $employee->password = bcrypt($request->password);
        $employee->name = $request->name;
        $employee->address = $request->address;
        $employee->city = $request->city;
        $employee->phone = $request->phone;
        $employee->balance = $request->balance;
        $employee->role_id = $request->role;
        $employee->showroom_id = Auth::user()->showroom_id;
        $employee->save();

        return redirect()->route('manager.employees.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editEmployee($id)
    {
        $employee = User::findOrFail($id);
        if(isset(Auth::user()->showroom->name)){
          $showroomName = Auth::user()->showroom->name;
        }else{
          $showroomName = "Belum Ada Izin";
        }
        return view('manager.employees.edit', compact('employee','showroomName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEmployee(Request $request, $id)
    {

        $this->validate($request, [
          'password' => 'required|confirmed|min:5|max:20',
          'name' => 'required|max:30',
          'address' => 'required|max:100',
          'city'  => 'required|max:20',
          'phone' => 'required|numeric',
          'balance' => 'required|digits_between:5,10',
          'role'  => 'required|numeric',
        ]);

        $employee = User::where('id', '=', $id)
          ->where('showroom_id', '=', Auth::user()->showroom_id)
          ->whereIn('role_id', [3, 4])
          ->first();
        $employee->password = bcrypt($request->password);
        $employee->name = $request->name;
        $employee->address = $request->address;
        $employee->city = $request->city;
        $employee->phone = $request->phone;
        $employee->balance = $request->balance;
        $employee->role_id = $request->role;
        $employee->showroom_id = Auth::user()->showroom_id;
        $employee->save();

        return redirect()->route('manager.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyEmployee($id)
    {
        $employee = User::where('id', '=', $id)
          ->where('showroom_id', '=', Auth::user()->showroom_id)
          ->whereIn('role_id', [3, 4])
          ->first();
        $employee->delete();
        return redirect()->route('manager.employees.index');
    }

    public function indexPricing()
    {
        $pricings = Item::where('showroom_id', '=', Auth::user()->showroom_id)
          ->where('item_category_id', 3)
          ->get();
        if(isset(Auth::user()->showroom->name)){
          $showroomName = Auth::user()->showroom->name;
        }else{
          $showroomName = "Belum Ada Izin";
        }

        return view('manager.pricings.index', compact('pricings', 'showroomName'));
    }

    public function createPricing()
    {
        $showroomName = Auth::user()->showroom->name;
        return view('manager.pricings.create', compact('showroomName'));
    }

    public function storePricing(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|max:30',
          'value' => 'required|digits_between:4,6',
        ]);

        $pricing = new Item;
        $pricing->showroom_id = Auth::user()->showroom_id;
        $pricing->item_category_id = 3;
        $pricing->name = $request->name;
        $pricing->value = $request->value;
        $pricing->save();

        return redirect()->route('manager.pricings.index');
    }

    public function editPricing($id)
    {
        $showroomName = Auth::user()->showroom->name;
        $pricing = Item::findOrFail($id);
        return view('manager.pricings.edit', compact('pricing', 'showroomName'));
    }


    public function updatePricing(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'required|max:30',
          'value' => 'required|digits_between:4,6',
        ]);

        $pricing = Item::where('id', '=', $id)
          ->where('showroom_id', '=', Auth::user()->showroom_id)
          ->first();
        $pricing->name = $request->name;
        $pricing->value = $request->value;
        $pricing->save();

        return redirect()->route('manager.pricings.index');
    }


    public function destroyPricing($id)
    {
        $pricing = Item::where('id', '=', $id)
          ->where('showroom_id', '=', Auth::user()->showroom_id)
          ->first();
        $pricing->delete();

        return redirect()->route('manager.pricings.index');
    }

    //pindahan operator
    public function materialsIndex()
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }
      $itemCategory = ItemCategory::where('name', 'material')->first();
      $materials = $itemCategory->materials;
      return view('manager.materials.index', compact('materials', 'showroomName'));
    }

    public function materialsCreate()
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }
      return view('manager.materials.create', compact('showroomName'));
    }

    public function materialsStore(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'quantity' => 'required|numeric|min:1',
        'value' =>  'required|digits_between:4,9',
        // 'transaction' => 'required|numeric',
      ]);

      $lastStock = Item::where('name', $request->name)
        ->where('item_category_id', 1)
        ->first(['stock']);

        if(!isset($lastStock)){
          $lastStock = 0;
        }else{
          $lastStock = $lastStock->stock;
        }

      $material = Item::firstOrNew([
        'name' => $request->name,
        'item_category_id' => 1,
      ]);
      $material->showroom_id = Auth::user()->showroom_id;
      $material->item_category_id = 1;
      $material->name = $request->name;
      $material->value  = $request->value;
      $material->stock = $request->quantity;
      /*
      $material->transaction_category = $request->transaction;
      if($request->transaction == 1){
        $material->stocks = $lastStock + $request->quantity;
      }else{
        $material->stocks = $lastStock - $request->quantity;
      }
      */
      $material->save();

      return redirect()->route('manager.materials.index');

    }

    public function materialsEdit($id)
    {
      $material = Item::findOrFail($id);
      return view('manager.materials.edit', compact('material'));

    }

    public function materialsStock($id)
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }
      $material = Item::findOrFail($id);
      return view('manager.materials.stock', compact('material', 'showroomName'));
    }

    public function materialsUpdateStock(Request $request, $id)
    {
      $this->validate($request, [
        'quantity' => 'required|numeric',
      ]);

      $lastStock = Item::where('id', $request->id)
        ->first(['stock']);

      $item = Item::find($id);
      $item->stock = $lastStock->stock + $request->quantity;
      $item->save();

      return redirect()->route('manager.materials.index');
    }

    public function materialsUpdate(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required|unique:items',
        'quantity' => 'required|numeric|min:1',
        'value' =>  'required|numeric',
        // 'stock' => 'required|numeric',
        // 'transaction_category' => 'required|numeric',
      ]);

      //find
      //get last stock item
      //last stock item + qty

      $lastStock = Item::where('name', $request->name)
        ->where('item_category_id', 1)
        ->first(['stock']);

      $material = Item::find($id);
      $material->showroom_id = Auth::user()->showroom_id;
      $material->item_category_id = 1;
      $material->name = $request->name;
      $material->value  = $request->value;
      /*
      // $material->quantity = $request->quantity;
      if($request->transaction_category == 1){
        $material->stocks = $lastStock + $request->quantity;
      }else{
        $material->stocks = $lastStock - $request->quantity;
      }
      $material->transaction_category = $request->transaction_category;
      */
      $material->save();

      return redirect()->route('manager.materials.index');

    }

    public function materialsDestroy($id)
    {
      $material = Item::findOrFail($id);
      $material->delete();

      return redirect()->route('manager.materials.index');
    }


    public function assetsIndex()
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }
      $itemCategory = ItemCategory::where('name', 'asset')->first();
      $assets = $itemCategory->assets;
      return view('manager.assets.index', compact('assets', 'showroomName'));
    }

    public function assetsCreate()
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }
      return view('manager.assets.create', compact('showroomName'));
    }

    public function assetsStore(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'quantity' => 'required|numeric|min:1',
        'value' =>  'required|numeric|digits_between:4,9',
        // 'transaction' => 'required|numeric',
      ]);

      //updateOrCreate
      //ambil last stock item
      //last stock item + qty
      $lastStock = Item::where('name', $request->name)
        ->where('item_category_id', 2)
        ->first(['stock']);

      // dd($lastStock);



      if(!isset($lastStock)){
        $lastStock = 0;
      }else{
        $lastStock = $lastStock->stock;
      }

      $asset = Item::firstOrNew([
        'name' => $request->name,
        'item_category_id' => 2,
      ]);
      $asset->showroom_id = Auth::user()->showroom_id;
      $asset->item_category_id = 2;
      $asset->name = $request->name;
      $asset->value  = $request->value;
      $asset->stock = $request->quantity;
      $asset->save();
      /*
      if($request->transaction == 1){
        $asset->stocks = $lastStock + $request->quantity;
      }else{
        $asset->stocks = $lastStock - $request->quantity;
      }
      $asset->transaction_category = $request->transaction;
      */


      return redirect()->route('manager.assets.index');


    }

    public function assetsEdit($id)
    {
      $asset = Item::findOrFail($id);
      return view('manager.assets.edit', compact('asset'));

    }

    public function assetsUpdate(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required|alpha|unique:items',
        'quantity' => 'required|numeric|min:1',
        'value' =>  'required|numeric',
        'stock' => 'required|numeric',
        // 'transaction_category' => 'required|numeric',
      ]);

      //find
      //get last stock item
      //last stock item + qty
      $lastStock = Item::where('name', $request->name)
        ->where('item_category_id', 1)
        ->first(['stock']);

      $asset = Item::find($id);
      $asset->showroom_id = Auth::user()->showroom_id;
      $asset->item_category_id = 2;
      $asset->name = $request->name;
      // $asset->quantity = $request->quantity;
      $asset->stocks = $lastStock;
      $asset->value  = $request->value;
      /*
      if($request->transaction_category == 1){
        $asset->stocks = $lastStock + $request->quantity;
      }else{
        $asset->stocks = $lastStock - $request->quantity;
      }
      $asset->transaction_category = $request->transaction_category;
      */
      $asset->save();

      return redirect()->route('manager.assets.index');
    }

    public function assetsStock($id)
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }
      $asset = Item::findOrFail($id);
      return view('manager.assets.stock', compact('asset', 'showroomName'));
    }

    public function assetsUpdateStock(Request $request, $id)
    {
      $this->validate($request, [
        'quantity' => 'required|numeric',
      ]);

      $lastStock = Item::where('id', $request->id)
        ->first(['stock']);

      $item = Item::find($id);
      $item->stock = $lastStock->stock + $request->quantity;
      $item->save();

      return redirect()->route('manager.assets.index');
    }

    public function assetsDestroy($id)
    {
      $asset = Item::findOrFail($id);
      $asset->delete();

      return redirect()->route('manager.assets.index');
    }
    //end pindahan operator
}
