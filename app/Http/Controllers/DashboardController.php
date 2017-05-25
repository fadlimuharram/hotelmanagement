<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    public function index(){

        return view('admin.dashboard',[
          'gettype'=> \App\Types::get(),
          'getstatus'=> \App\Status::get(),
          'getrooms'=> \App\Rooms::with('types','status')->get()
        ]);

    }

    protected function validateroom($request){
      $validasi = Validator::make($request->all(),[
        'rnumber'=>'required|unique:rooms,rnumber|max:10',
        'type'=>'required|exists:types,id',
        'status'=>'required|exists:statuses,id'
      ]);

      if ($validasi->fails()){
        return $validasi;
      }else {
        return true;
      }

    }


}
