<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Item;
use App\ItemCategory;
use Validator;
use Auth;

class OperatorController extends Controller
{
    public function materialsIndex()
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }
      $itemCategory = ItemCategory::where('name', 'material')->first();
      $materials = $itemCategory->materials;
      return view('operator.materials.index', compact('materials', 'showroomName'));
    }

    public function materialsCreate()
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }
      return view('operator.materials.create', compact('showroomName'));
    }

    public function materialsStore(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|alpha',
        'quantity' => 'required|numeric|min:1',
        'value' =>  'required|digits_between:4,9',
        'transaction' => 'required|numeric',
      ]);

      $lastStock = Item::where('name', $request->name)
        ->where('item_category_id', 1)
        ->first(['stocks']);

        if(!isset($lastStock)){
          $lastStock = 0;
        }else{
          $lastStock = $lastStock->stocks;
        }

      $material = Item::firstOrNew([
        'name' => $request->name,
        'item_category_id' => 1,
      ]);
      $material->showroom_id = Auth::user()->showroom_id;
      $material->item_category_id = 1;
      $material->name = $request->name;
      $material->value  = $request->value;
      $material->transaction_category = $request->transaction;
      if($request->transaction == 1){
        $material->stocks = $lastStock + $request->quantity;
      }else{
        $material->stocks = $lastStock - $request->quantity;
      }
      $material->save();

      return redirect()->route('operator.materials.index');

    }

    public function materialsEdit($id)
    {
      $material = Item::findOrFail($id);
      return view('operator.materials.edit', compact('material'));


    }

    public function materialsUpdate(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required|alpha|unique:items',
        'quantity' => 'required|numeric|min:1',
        'value' =>  'required|numeric',
        'stock' => 'required|numeric',
        'transaction_category' => 'required|numeric',
      ]);

      //find
      //get last stock item
      //last stock item + qty

      $lastStock = Item::where('name', $request->name)
        ->where('item_category_id', 1)
        ->first(['stocks']);

      $material = Item::find($id);
      $material->showroom_id = Auth::user()->showroom_id;
      $material->item_category_id = 1;
      $material->name = $request->name;
      // $material->quantity = $request->quantity;
      $material->value  = $request->value;
      if($request->transaction_category == 1){
        $material->stocks = $lastStock + $request->quantity;
      }else{
        $material->stocks = $lastStock - $request->quantity;
      }
      $material->transaction_category = $request->transaction_category;
      $material->save();

      return redirect()->route('operator.materials.index');

    }

    public function materialsDestroy($id)
    {
      $material = Item::findOrFail($id);
      $material->delete();

      return redirect()->route('operator.materials.index');
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
      return view('operator.assets.index', compact('assets', 'showroomName'));
    }

    public function assetsCreate()
    {
      if(isset(Auth::user()->showroom->name)){
        $showroomName = Auth::user()->showroom->name;
      }else{
        $showroomName = "Belum Ada Izin";
      }
      return view('operator.assets.create', compact('showroomName'));
    }

    public function assetsStore(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|alpha',
        'quantity' => 'required|numeric|min:1',
        'value' =>  'required|numeric|digits_between:4,9',
        'transaction' => 'required|numeric',
      ]);

      //updateOrCreate
      //ambil last stock item
      //last stock item + qty
      $lastStock = Item::where('name', $request->name)
        ->where('item_category_id', 2)
        ->first(['stocks']);

      // dd($lastStock);



      if(!isset($lastStock)){
        $lastStock = 0;
      }else{
        $lastStock = $lastStock->stocks;
      }

      $asset = Item::firstOrNew([
        'name' => $request->name,
        'item_category_id' => 2,
      ]);
      $asset->showroom_id = Auth::user()->showroom_id;
      $asset->item_category_id = 2;
      $asset->name = $request->name;
      $asset->value  = $request->value;
      if($request->transaction == 1){
        $asset->stocks = $lastStock + $request->quantity;
      }else{
        $asset->stocks = $lastStock - $request->quantity;
      }
      $asset->transaction_category = $request->transaction;
      $asset->save();

      return redirect()->route('operator.assets.index');


    }

    public function assetsEdit($id)
    {
      $asset = Item::findOrFail($id);
      return view('operator.assets.edit', compact('asset'));

    }

    public function assetsUpdate(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required|alpha|unique:items',
        'quantity' => 'required|numeric|min:1',
        'value' =>  'required|numeric',
        'stock' => 'required|numeric',
        'transaction_category' => 'required|numeric',
      ]);

      //find
      //get last stock item
      //last stock item + qty
      $lastStock = Item::where('name', $request->name)
        ->where('item_category_id', 1)
        ->first(['stocks']);

      $asset = Item::find($id);
      $asset->showroom_id = Auth::user()->showroom_id;
      $asset->item_category_id = 2;
      $asset->name = $request->name;
      // $asset->quantity = $request->quantity;
      $asset->value  = $request->value;
      if($request->transaction_category == 1){
        $asset->stocks = $lastStock + $request->quantity;
      }else{
        $asset->stocks = $lastStock - $request->quantity;
      }
      $asset->transaction_category = $request->transaction_category;
      $asset->save();

      return redirect()->route('operator.assets.index');
    }

    public function assetsDestroy($id)
    {
      $asset = Item::findOrFail($id);
      $asset->delete();

      return redirect()->route('operator.assets.index');
    }
}
