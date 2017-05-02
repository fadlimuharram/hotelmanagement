<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Status;
use App\Http\Controllers\RoomssettingController;
use Illuminate\Support\Facades\Storage;

class StatusController extends RoomssettingController
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validasi = $this->statusvalidate($request);
        $random_name = '';
        if ($validasi===true) {

          $icon = $request->file('icon');

          if ($icon!=null) {
            $random_name = time() . rand(100,1000) . '.' . strval($icon->getClientOriginalExtension());
            $icon->storeAs('public/'.$this->diricon,$random_name);
          }

          $masuk = new Status;
          $masuk->namestatus = $request->namestatus;
          $masuk->icon       = ($random_name!='') ? $random_name : null;
          $masuk->hex_color  = $request->hex_color;
          $masuk->timestamps = true;
          $masuk->save();
          return redirect('RoomSettings');
        }else {
          return redirect('RoomSettings')->withErrors($validasi);
        }
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
        $validasi = $this->statusvalidate($request);

        if ($validasi===true) {

          $upd = Status::findOrFail($id);
          $upd->namestatus = $request->namestatus;

          if ($request->pilihediticon != 'nochange') {

            if ($upd->icon != null) {
              Storage::delete('public/'.$this->diricon . '/' . $upd->icon);
            }

            if ($request->pilihediticon == 'replace' && $request->file('icon') != null) {
              $reqimg = $request->file('icon');
              $imagename =  time() . rand(100,1000) . "." . strval($reqimg->getClientOriginalExtension());
              $reqimg->storeAs('public/'.$this->diricon,$imagename);
              $upd->icon = $imagename;
            }elseif ($request->pilihediticon == 'kosong') {
              $upd->icon = null;
            }

          }

          $upd->hex_color  = $request->hex_color;
          $upd->timestamps = true;
          $upd->save();

          return redirect('RoomSettings');
        }else {
          return redirect('RoomSettings')->withErrors($validasi);
        }
    }


    public function destroy($id)
    {
        $del = Status::findOrFail($id);
        $del->delete();
        return redirect('RoomSettings');
    }
}
