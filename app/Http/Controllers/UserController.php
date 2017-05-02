<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  

    public function index()
    {

        return view('admin.profile');
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
    public function store(Request $request)
    {



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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editcurrentuser(Request $request){

      $id = Auth::user()->id;
      $cek = array();

      if ($request->email != Auth::user()->email) {
        $cek['email'] = 'required|unique:users|email';
      }else {
        $cek['email'] = 'required|email';
      }

      if ($request->password != '') {
        $cek['password'] = 'min:6';
        $cek['confirmpass'] = 'same:password';
      }

      $cek['name'] = 'required|max:45';

      if ($request->file('picprofile') != null) {
        $cek['picprofile'] = 'mimes:jpeg,jpg,png|max:10000';
      }

      $validasi = Validator::make($request->all(),$cek);

      if ($validasi->fails()) {
        return redirect('profiles')->withErrors($validasi);
      }

      if (Auth::user()->picture != '' && $request->file('picprofile') != null) {
        Storage::delete('public/'.$this->dirprofile . '/' . Auth::user()->picture);
      }

      if ($request->file('picprofile') != null) {
        $reqimg = $request->file('picprofile');
        $imagename = $id . md5($id) . $id . "." . strval($reqimg->getClientOriginalExtension());
        $reqimg->storeAs('public/'.$this->dirprofile,$imagename);
      }



      $masuk = User::findorfail($id);
      $masuk->password = ($request->password != '') ? bcrypt($request->password) : $masuk->password;
      $masuk->email = $request->email;
      $masuk->name = $request->name;
      $masuk->picture = ($request->file('picprofile')!=null) ? $imagename : $masuk->picture;

      $masuk->save();
      return redirect('profiles');
    }

    public function logout(){
      Auth::logout();
      return redirect('/');
    }
}
