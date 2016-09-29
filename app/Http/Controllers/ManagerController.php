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
use Session;

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

    public function showEmployee($id)
    {
      $employee = User::find($id);
      return view('manager.employees.show', compact('employee'));
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

        $validator = Validator::make($request->all(), [
          'email' => 'required|email|unique:users',
          'password' => 'required|confirmed|min:5|max:20',
          'name' => 'required|max:30',
          'address' => 'required|max:100',
          'city'  => 'required|max:20',
          'phone' => 'required|numeric',
          'balance' => 'required|digits_between:5,10',
          'role'  => 'required|numeric',
        ]);

        if($validator->fails())
        {

          $url = route('home').'#!/'.route('manager.employees.index');
          return redirect($url)->withInput()->withErrors($validator);

        }else{

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

          // return redirect()->route('manager.employees.index');
          // return redirect()->route('home');
          $url = route('home').'#!/'.route('manager.employees.index');
          return redirect($url);
        }



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

        $validator = Validator::make($request->all(), [
          'password' => 'required|confirmed|min:5|max:20',
          'name' => 'required|max:30',
          'address' => 'required|max:100',
          'city'  => 'required|max:20',
          'phone' => 'required|numeric',
          'balance' => 'required|digits_between:5,10',
          // 'role'  => 'required|numeric',
        ]);

        if($validator->fails())
        {
          $url = route('home').'#!/'.route('manager.employees.edit', $id);
          return redirect($url)->withInput()->withErrors($validator);

        }else{

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
          // $employee->role_id = $request->role;
          $employee->showroom_id = Auth::user()->showroom_id;
          $employee->save();

          // return redirect()->route('manager.employees.index');
          // return redirect()->route('home');
          $url = route('home').'#!/'.route('manager.employees.index');
          return redirect($url);
        }
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
        // return redirect()->route('manager.employees.index');
        // return redirect()->route('home');
        $url = route('home').'#!/'.route('manager.employees.index');
        return redirect($url);
    }

/*
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

    public function showPricing($id)
    {
      $pricing = Item::find($id);
      return view('manager.pricings.show', compact('pricing'));
    }

    public function createPricing()
    {
        $showroomName = Auth::user()->showroom->name;
        return view('manager.pricings.create', compact('showroomName'));
    }

    public function storePricing(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'name' => 'required|max:30',
          'value' => 'required|digits_between:4,6',
        ]);

        if($validator->fails())
        {
          $url = route('home').'#!/'.route('manager.pricings.create');
          return redirect($url)->withInput()->withErrors($validator);
        }else {
          $pricing = new Item;
          $pricing->showroom_id = Auth::user()->showroom_id;
          $pricing->item_category_id = 3;
          $pricing->name = $request->name;
          $pricing->value = $request->value;
          $pricing->save();

          $url = route('home').'#!/'.route('manager.pricings.index');
          return redirect($url);
        }

        // return redirect()->route('manager.pricings.index');
        // return redirect()->route('home');
    }

    public function editPricing($id)
    {
        $showroomName = Auth::user()->showroom->name;
        $pricing = Item::findOrFail($id);
        return view('manager.pricings.edit', compact('pricing', 'showroomName'));
    }


    public function updatePricing(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
          'name' => 'required|max:30',
          'value' => 'required|digits_between:4,6',
        ]);

        if($validator->fails())
        {
          $url = route('home').'#!/'.route('manager.pricings.edit', $id);
          return redirect($url)->withInput()->withErrors($validator);
        }else {
          $pricing = Item::where('id', '=', $id)
            ->where('showroom_id', '=', Auth::user()->showroom_id)
            ->first();
          $pricing->name = $request->name;
          $pricing->value = $request->value;
          $pricing->save();

          // return redirect()->route('home');
          // return redirect()->route('manager.pricings.index');
          $url = route('home').'#!/'.route('manager.pricings.index');
          return redirect($url);
        }


    }


    public function destroyPricing($id)
    {
        $pricing = Item::where('id', '=', $id)
          ->where('showroom_id', '=', Auth::user()->showroom_id)
          ->first();
        $pricing->delete();

        // return redirect()->route('manager.pricings.index');
        // return redirect()->route('home');
        $url = route('home').'#!/'.route('manager.pricings.index');
        return redirect($url);
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

    public function materialsShow($id)
    {
      $material = Item::find($id);
      return view('manager.materials.show', compact('material'));
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
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'quantity' => 'required|numeric|min:1',
        'value' =>  'required|digits_between:4,9',
        // 'transaction' => 'required|numeric',
      ]);

      if($validator->fails())
      {
        $url = route('home').'#!/'.route('manager.materials.create');
        return redirect($url)->withInput()->withErrors($validator);
      }else{

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

              //$material->transaction_category = $request->transaction;
              //if($request->transaction == 1){
              //  $material->stocks = $lastStock + $request->quantity;
              //}else{
              //  $material->stocks = $lastStock - $request->quantity;
              //}

              $material->save();

              $url = route('home').'#!/'.route('manager.materials.index');
              return redirect($url);
              // return redirect()->route('manager.materials.index');
              // return redirect()->route('home');
      }


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
      $validator = Validator::make($request->all(), [
        'quantity' => 'required|numeric',
      ]);

      if($validator->fails()){
        $url = route('home').'#!/'.route('manager.materials.stock', $id);
        return redirect($url)->withInput()->withErrors($validator);
      }else{
        $lastStock = Item::where('id', $request->id)
          ->first(['stock']);

        $item = Item::find($id);
        $item->stock = $lastStock->stock + $request->quantity;
        $item->save();

        // return redirect()->route('home');
        // return redirect()->route('manager.materials.index');
        $url = route('home').'#!/'.route('manager.materials.index');
        return redirect($url);
      }


    }

    public function materialsUpdate(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|unique:items',
        'quantity' => 'required|numeric|min:1',
        'value' =>  'required|numeric',
        // 'stock' => 'required|numeric',
        // 'transaction_category' => 'required|numeric',
      ]);

      if($validator->fails()){
        $url = route('home').'#!/'.route('manager.materials.edit', $id);
        return redirect($url);
      }else{
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

        // $material->quantity = $request->quantity;
        //if($request->transaction_category == 1){
        //  $material->stocks = $lastStock + $request->quantity;
        //}else{
        //  $material->stocks = $lastStock - $request->quantity;
        //}
        //$material->transaction_category = $request->transaction_category;

        $material->save();

        // return redirect()->route('home');
        // return redirect()->route('manager.materials.index');
        $url = route('home').'#!/'.route('manager.materials.index');
        return redirect($url);
      }


    }

    public function materialsDestroy($id)
    {
      $material = Item::findOrFail($id);
      $material->delete();

      // return redirect()->route('home');
      // return redirect()->route('manager.materials.index');
      $url = route('home').'#!/'.route('manager.materials.index');
      return redirect($url);
    }
*/

    public function assetsIndex()
    {
      $showroomName = User::getShowroom('name');
      //$itemCategory = ItemCategory::where('name', 'asset')->get();
      $assets = Item::assets()->get();
      return view('manager.assets.index', compact('assets', 'showroomName'));
    }

    public function assetsShow($id)
    {
      $asset = Item::find($id);
      return view('manager.assets.show', compact('asset'));
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
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'quantity' => 'required|numeric|min:1',
        'value' =>  'required|numeric|digits_between:4,9',
        // 'transaction' => 'required|numeric',
      ]);

      if($validator->fails())
      {
        // $url = route('home').'#!/'.route('manager.assets.create');
        return back()->withInput()->withErrors($validator);
      }else{

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
                'item_category_id' => 1,
              ]);
              $asset->showroom_id = Auth::user()->showroom_id;
              $asset->item_category_id = 1;
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


              // return redirect()->route('home');
              // return redirect()->route('manager.assets.index');
              // $url = route('home').'#!/'.route('manager.assets.index');
              return redirect()->route('manager.assets.index');
      }



    }

    public function assetsEdit($id)
    {
      $showroomName = User::getShowroom('name');
      $asset = Item::findOrFail($id);
      return view('manager.assets.edit', compact('asset', 'showroomName'));

    }

    public function assetsUpdate(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|unique:items',
        // 'quantity' => 'required|numeric|min:1',
        'value' =>  'required|numeric',
        // 'stock' => 'required|numeric',
        // 'transaction_category' => 'required|numeric',
      ]);

      if($validator->fails()){
        // $url = route('home').'#!/'.route('manager.assets.edit', $id);
        return back()->withInput()->withErrors($validator);
      }else{
        //find
        //get last stock item
        //last stock item + qty
        $lastStock = Item::where('name', $request->name)
          ->where('item_category_id', 1)
          ->first(['stock']);

        $asset = Item::find($id);
        $asset->showroom_id = Auth::user()->showroom_id;
        $asset->item_category_id = 1;
        $asset->name = $request->name;
        // $asset->quantity = $request->quantity;
        // $asset->stocks = $lastStock;
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

        // return redirect()->route('home');
        // return redirect()->route('manager.assets.index');
        // $url = route('home').'#!/'.route('manager.assets.index');
        return redirect()->route('manager.assets.index');
      }


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
      $validator = Validator::make($request->all(), [
        'quantity' => 'required|numeric',
      ]);

      if($validator->fails()){
        // $url = route('home').'#!/'.route('manager.assets.stock', $id);
        return back()->withInput()->withErrors($validator);
      }else{
        $lastStock = Item::where('id', $request->id)
          ->first(['stock']);

        $item = Item::find($id);
        $item->stock = $lastStock->stock + $request->quantity;
        $item->save();

        // return redirect()->route('home');
        // return redirect()->route('manager.assets.index');
        // $url = route('home').'#!/'.route('manager.assets.index');
        return redirect()->route('manager.assets.index');
      }


    }

    public function assetsDestroy($id)
    {
      $asset = Item::findOrFail($id);
      $asset->delete();

      // return redirect()->route('manager.assets.index');
      // return redirect()->route('home');
      // $url = route('home').'#!/'.route('manager.assets.index');
      return redirect()->route('manager.assets.index');
    }
    //end pindahan operator

    //Services
    public function servicesIndex()
    {
      $showroomName = User::getShowroom('name');
      $services = Item::services()->get();
      return view('manager.services.index', compact('services', 'showroomName'));
    }

    public function servicesCreate()
    {
      $showroomName = User::getShowroom('name');
      $servicesCategory = ItemCategory::services()->get();
      return view('manager.services.create', compact('servicesCategory', 'showroomName'));
    }

    public function servicesStore(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'stockable' => 'required',
        // 'stock' => 'required',
        'value' => 'required',
        'serviceCategory' => 'required|numeric',
      ]);

      if($validator->fails()){
        return back()->withInput()->withErrors($validator);
      }else{

        $item = new Item;
        $item->name = $request->name;
        $item->stockable = $request->stockable;
        if($request->stockable != 0){
          $item->stock = $request->stock;
        }
        $item->value = $request->value;
        $item->item_category_id = $request->serviceCategory;
        $item->showroom_id = User::getShowroom('id');
        $item->save();

        return redirect()->route('manager.services.index');
      }
    }

    public function servicesEdit($id)
    {
      $service = Item::currentShowroom()->services()->itemId($id)->first();
      $showroomName = User::getShowroom('name');
      return view('manager.services.edit', compact('service', 'showroomName'));
    }

    public function servicesUpdate(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        // 'stock' => 'required',
        'value' => 'required',
      ]);

      if($validator->fails()){
        return back()->withInput()->withErrors($validator);
      }else{
        $service = Item::currentShowroom()->services()->itemId($id)->first();
        $service->name = $request->name;
        $service->value = $request->value;
        $service->save();
        return redirect()->route('manager.services.index');
      }
    }

    public function servicesDestroy($id)
    {
      if(Item::currentShowroom()->services()->itemId($id)->delete()){
        return redirect()->route('manager.services.index');
      }else{
        echo "Something Wrong";
      }
    }

    public function servicesStock($id)
    {
      $service = Item::currentShowroom()->services()->itemId($id)->first();
      $showroomName = User::getShowroom('name');
      return view('manager.services.stock', compact('service', 'showroomName'));
    }

    public function servicesUpdateStock(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'stock' => 'required',
      ]);

      if($validator->fails()){
        return back()->withInput()->withErrors($validator);
      }else{
        $lastStock = Item::currentShowroom()->services()->itemId($id)->first(['stock']);
        $service = Item::currentShowroom()->services()->itemId($id)->first();
        $service->stock = $lastStock->stock + $request->stock;
        $service->save();
        return redirect()->route('manager.services.index');
      }
    }

    public function servicesCategoryIndex()
    {
      $showroomName = User::getShowroom('name');
      $servicesCategory = ItemCategory::services()->get();
      return view('manager.services.category.index', compact('servicesCategory', 'showroomName'));
    }

    public function servicesCategoryCreate()
    {
      $showroomName = User::getShowroom('name');
      return view('manager.services.category.create', compact('showroomName'));
    }

    public function servicesCategoryStore(Request $request)
    {
      $validator =  Validator::make($request->all(),
      [
        'name' => 'required',
      ]);

      if($validator->fails()){
        return back()->withInput()->withErrors($validator);
      }else{
        $serviceCategory = new ItemCategory;
        $serviceCategory->name = $request->name;
        $serviceCategory->save();
        return redirect()->route('manager.servicesCategory.index');
      }
    }

    public function servicesCategoryEdit($id)
    {
      $showroomName = User::getShowroom('name');
      $serviceCategory = ItemCategory::services()->where('id', $id)->first();
      return view('manager.services.category.edit', compact('showroomName', 'serviceCategory'));
    }

    public function servicesCategoryUpdate(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
      ]);

      if($validator->fails()){
        return back()->withInput()->withErrors($validator);
      }else{
        $serviceCategory = ItemCategory::services()->where('id', $id)->first();
        $serviceCategory->name = $request->name;
        $serviceCategory->save();
        return redirect()->route('manager.servicesCategory.index');
      }
    }

    public function servicesCategoryDestroy($id)
    {
      $serviceCategory = ItemCategory::services()->where('id', $id)->delete();
      return redirect()->route('manager.servicesCategory.index');
    }

    public function profileIndex()
    {
      $showroomName = User::getShowroom('name');
      // $showroomId = User::
      return view('manager.profile.index', compact('showroomName'));
    }

    public function profileCreate()
    {

    }

    public function profileStore(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'logo' => 'required|image',
      ]);

      if($validator->fails()){
        return back()->withErrors($validator);
      }else{
        if($request->file('logo')->isValid()){
          $dest = 'uploads/';
          $ext = $request->file('logo')->getClientOriginalExtension();
          $filename = rand(11111,99999).'.'.$ext;
          $pathToFile = $dest . $filename;
          $request->file('logo')->move($dest, $filename);
          $showroom = Showroom::find($id);
          $showroom->logo = $pathToFile;
          $showroom->save();

          return redirect()->route('manager.profile.index');
        }
      }
    }

    public function profileEdit()
    {

    }

    public function profileUpdate()
    {

    }


}
