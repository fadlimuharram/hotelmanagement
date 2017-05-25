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
        $getusers = User::get();
        return view('admin.profile',['getusers'=>$getusers]);
    }

  
    public function create()
    {
        //
    }


    public function store(Request $request)
    {



    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


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

      if ($request->ktp != Auth::user()->ktp) {
        $cek['ktp'] = 'required|min:16|unique:users';
      }else {
        $cek['ktp'] = 'required|min:16';
      }


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

      $deskripsi = Auth::user()->name . " has edited their profile on " . \Carbon\Carbon::now()->toDateTimeString() . " With Ip Address : " . $request->ip();;//unutk deskripsi tracked_edited_users

      $masuk = User::findorfail($id);
      $masuk->password = ($request->password != '') ? bcrypt($request->password) : $masuk->password;
      $masuk->email = $request->email;
      $masuk->name = $request->name;
      $masuk->ktp = $request->ktp;
      $masuk->picture = ($request->file('picprofile')!=null) ? $imagename : $masuk->picture;

      $masuk->save();

      $this->insert_tracked_user($id,$request,$deskripsi);//unutk deskripsi tracked_edited_users

      return redirect('profiles');
    }

    public function insert_tracked_user($id_user,$request,$deskripsi){
      $msk = new \App\TrackedModel\TrackedEditedUsers;
      $msk->name  = $request->name;
      $msk->email = $request->email;
      $msk->ktp   = $request->ktp;
      $msk->description = $deskripsi;
      $msk->users_id = $id_user;
      $msk->timestamps = true;
      $msk->save();
      return true;
    }

    public function insert_tracked_accept_revoke($id_user,$desc){
      $msk = new \App\TrackedModel\TrackedAcceptRevokeUsers;
      $msk->users_id = $id_user;
      $msk->description = $desc;
      $msk->save();

      return true;
    }

    public function acceptaccess(Request $req){
      if ($req->id != Auth::user()->id) {
        $acc = User::findOrFail($req->id);
        $acc->is_register = 't';

        $desc = 'User ' . Auth::user()->name . ' Is Accpted Admin Access To User ' . $acc->name;
        $acc->save();



        $this->insert_tracked_accept_revoke(Auth::user()->id,$desc);

      }
      return redirect('profiles');
    }

    public function revokeaccess(Request $req){
      if ($req->id != Auth::user()->id) {
        $revoke = User::findOrFail($req->id);
        $revoke->is_register = 'f';

        $desc = 'User ' . Auth::user()->name . ' Is Revoke Admin Access To User ' . $revoke->name;

        $revoke->save();


        $this->insert_tracked_accept_revoke(Auth::user()->id,$desc);
      }
      return redirect('profiles');
    }

    public function logout(){
      Auth::logout();
      return redirect('/');
    }
}
