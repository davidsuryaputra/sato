<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Showroom;
use App\User;
use App\Role;
use App\Pricing;
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
        $pricings = Pricing::where('showroom_id', '=', Auth::user()->showroom_id)
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

        $pricing = new Pricing;
        $pricing->showroom_id = Auth::user()->showroom_id;
        $pricing->name = $request->name;
        $pricing->value = $request->value;
        $pricing->save();

        return redirect()->route('manager.pricings.index');
    }

    public function editPricing($id)
    {
        $showroomName = Auth::user()->showroom->name;
        $pricing = Pricing::findOrFail($id);
        return view('manager.pricings.edit', compact('pricing', 'showroomName'));
    }

    public function Pricing(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'required|max:30',
          'value' => 'required|digits_between:4,6',
        ]);

        $pricing = Pricing::where('id', '=', $id)
          ->where('showroom_id', '=', Auth::user()->showroom_id)
          ->first();
        $pricing->name = $request->name;
        $pricing->value = $request->value;
        $pricing->save();

        return redirect()->route('manager.pricings.index');
    }

    public function destroyPricing($id)
    {
        $pricing = Pricing::where('id', '=', $id)
          ->where('showroom_id', '=', Auth::user()->showroom_id)
          ->first();
        $pricing->delete();

        return redirect()->route('manager.pricings.index');
    }
}
