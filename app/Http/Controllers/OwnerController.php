<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Showroom;
use App\User;
use Validator;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexShowroom()
    {
        $showrooms = Showroom::with('users')->get();
        return view('owner.showrooms.list')->withShowrooms($showrooms);
    }

    public function indexManager()
    {
        $managers = User::where('role_id', '=', '2')->get();
        return view('owner.managers.list')->withManagers($managers);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createManager()
    {

        $showroomKosong = 0;
        $showrooms = Showroom::all();
        foreach($showrooms as $showroom){
          if(!isset($showroom->manager->name)){
            $showroomKosong++;
          }
        }


        return view('owner.managers.create', compact('showrooms', 'showroomKosong'));
        // return view('owner.managers.create');
        // return 'x';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeShowroom(Request $request)
    {

        $this->validate($request, [
          'name' => 'required|max:30',
          'address' => 'required|max:100',
          'city'  => 'required|max:20',
          'phone' => 'required|numeric',
          // 'balance' => 'required|digits_between:5,10',
        ]);

        $data = $request->all();
        Showroom::create($data);
        return redirect()->route('owner.showrooms');

    }

    public function storeManager(Request $request)
    {

        $this->validate($request, [
          'email' => 'required|email|unique:users',
          'password' => 'required|confirmed|min:5|max:20',
          'name' => 'required|max:30',
          'address' => 'required|max:100',
          'city'  => 'required|max:20',
          'phone' => 'required|numeric',
          'balance' => 'required|digits_between:5,10',
          // 'showroom' => 'required|numeric',
        ]);

        $manager = new User;
        $manager->email = $request->email;
        $manager->password = bcrypt($request->password);
        $manager->name = $request->name;
        $manager->address = $request->address;
        $manager->city = $request->city;
        $manager->phone = $request->phone;
        $manager->balance = $request->balance;
        $manager->role_id = 2;

        /*
        if(isset($request->showroom)){
        $manager->showroom_id = $request->showroom;
        }else{
        $manager->showroom_id = "";
        }
        */

        $manager->save();

        return redirect()->route('owner.managers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showManager($id)
    {
        $manager = User::where('id', $id)->where('role_id', 2)->first();
        return view('owner.managers.show', compact('manager'));
        // return "your id is $id";
    }

    public function showShowroom($id)
    {
      $showroom = Showroom::find($id);
      return view('owner.showrooms.show', compact('showroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editShowroom($id)
    {
        $showroom = Showroom::findOrFail($id);
        $managers = User::where('role_id', '=', 2)
          ->whereNull('showroom_id')
          ->get();
        return view('owner.showrooms.edit', compact('showroom', 'managers'));
    }

    public function editManager($id)
    {
        $showroomKosong = 0;
        $manager = User::findOrFail($id);
        $showrooms = Showroom::all();
        foreach($showrooms as $showroom){
          if(!isset($showroom->manager->name)){
            $showroomKosong++;
          }
        }
        return view('owner.managers.edit', compact('manager', 'showrooms', 'showroomKosong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateShowroom(Request $request, $id)
    {
      // dd($request->manager);

      $this->validate($request, [
        'name' => 'required|max:30',
        'address' => 'required|max:100',
        'city'  => 'required|max:20',
        'phone' => 'required|numeric',
        // 'balance' => 'required|digits_between:5,10',
        'manager' => 'numeric',
      ]);

        $showroom = Showroom::find($id);

        if(is_numeric($request->manager)){
        $manager = User::find($request->manager);
        $manager->showroom()->associate($showroom);
        $manager->save();
        }

        $showroom->name = $request->name;
        $showroom->address = $request->address;
        $showroom->city = $request->city;
        $showroom->phone = $request->phone;
        $showroom->balance = $request->balance;
        $showroom->save();

        return redirect()->route('owner.showrooms');

    }

    public function updateManager(Request $request, $id)
    {
        $manager = User::find($id);
        $manager->name = $request->name;
        $manager->address = $request->address;
        $manager->city = $request->city;
        $manager->phone= $request->phone;
        $manager->balance = $request->balance;
        $manager->password = bcrypt($request->password);
        if($manager->showroom_id == null){
          $manager->showroom_id = $request->showroom;
        }
        $manager->save();

        return redirect()->route('owner.managers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyShowroom($id)
    {
        $manager = User::where('role_id', '=', 2)
          ->where('showroom_id', '=', $id)
          ->first();
        $manager->showroom()->dissociate();
        $manager->save();

        $showroom = Showroom::find($id);
        $showroom->delete();
        //remove showroom from user
        return redirect('owner/showrooms');
    }

    public function destroyManager($id)
    {
        $manager = User::find($id);
        $manager->delete();
        // return redirect()->route('owner.managers.index');
        return redirect()->route('home');
        // return $id;
    }
}
