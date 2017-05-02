<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RoomssettingController;
use Illuminate\Support\Facades\Validator;
use App\Types;

class TypesController extends RoomssettingController
{

  public function store(Request $request)
  {
      $validasi = $this->typevalidate($request);
      if ($validasi===true) {
        $masuk = new Types;
        $masuk->name_type = $request->nametype;
        $masuk->priceperhour = $request->price;
        $masuk->timestamps = true;
        $masuk->save();

        return redirect('RoomSettings');
      }else {
        return redirect('RoomSettings')->withErrors($validasi);
      }
  }


  public function update(Request $request, $id)
  {
    $validasi = $this->typevalidate($request);

    if ($validasi===true) {
      $upd = Types::findOrFail($id);
      $upd->name_type = $request->nametype;
      $upd->priceperhour = $request->price;
      $upd->timestamps = true;
      $upd->save();

      return redirect('RoomSettings');
    }else {
      return redirect('RoomSettings')->withErrors($validasi);
    }


  }


  public function destroy($id)
  {
      $del = Types::findOrFail($id);
      $del->delete();
      return redirect('RoomSettings');
  }
}
