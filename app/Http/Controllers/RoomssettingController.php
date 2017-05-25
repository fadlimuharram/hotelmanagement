<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Types;
use App\Status;

class RoomssettingController extends Controller
{
  
    public function index()
    {
        $gettype = Types::get();
        $getstatus = Status::get();
        return view('admin.roomssetting',['gettype'=>$gettype,'getstatus'=>$getstatus]);
    }

    protected function typevalidate($request){

      $validasi = Validator::make($request->all(),[
        'nametype'=>'required|max:50',
        'price'=>'required|numeric|max:999999999999'
      ]);

      if ($validasi->fails()){
        return $validasi;
      }else {
        return true;
      }

    }

    protected function statusvalidate($request){
      $aturan = array();
      if ($request->file('icon') != null) {
        $aturan['icon'] = 'mimes:jpeg,jpg,png|max:10000';
      }
      $aturan['hex_color'] = 'required|max:30';
      $aturan['namestatus'] = 'required|max:50';

      $validasi = Validator::make($request->all(),$aturan);

      if ($validasi->fails()) {
        return $validasi;
      }else {
        return true;
      }

    }


}
