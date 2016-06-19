<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Showroom;
use App\User;
// use Illuminate\Support\Facades\Validator;
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
        $showrooms = Showroom::all();
        return view('backend.owner.showrooms.list')->withShowrooms($showrooms);
    }

    public function indexManager()
    {
        $managers = User::where('role_id', '=', '2')->get();
        return view('backend.owner.managers.list')->withManagers($managers);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
          'balance' => 'required|digits_between:5,10',
        ]);

        $data = $request->all();
        Showroom::create($data);
        return redirect()->route('owner.showrooms');

    }

    public function storeManager(Request $request)
    {

        $this->validate($request, [
          'email' => 'required|email',
          'password' => 'required|confirmed|min:5|max:20',
          'name' => 'required|max:30',
          'address' => 'required|max:100',
          'city'  => 'required|max:20',
          'phone' => 'required|numeric',
          'balance' => 'required|digits_between:5,10',
        ]);

        $data = [
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'name' => $request->name,
          'address' => $request->address,
          'city'  => $request->city,
          'phone'  => $request->phone,
          'balance' => $request->balance,
          'role_id' => 2,
        ];
        // dd($data);
        User::create($data);
        return redirect()->route('owner.managers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editShowroom($id)
    {
        // return $id;
        $showroom = Showroom::findOrFail($id);
        // return $showroom;
        return view('backend.owner.showrooms.edit', compact('showroom'));
        // dd($showroom);
    }

    public function editManager($id)
    {
        $manager = User::findOrFail($id);
        return view('backend.owner.managers.edit', compact('manager'));
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
        $showroom = Showroom::find($id);
        $showroom->update($request->all());
        return redirect()->route('owner.showrooms');
    }

    public function updateManager(Request $request, $id)
    {
        $manager = User::find($id);
        $manager->update($request->all());
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
        $showroom = Showroom::find($id);
        $showroom->delete();
        return redirect('owner/showrooms');
    }

    public function destroyManager($id)
    {
        $manager = User::find($id);
        $manager->delete();
        return redirect()->route('owner.managers.index');
    }
}
