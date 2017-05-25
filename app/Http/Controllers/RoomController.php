<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Rooms;
class RoomController extends DashboardController
{

    public function index()
    {

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validasi = $this->validateroom($request);

        if ($validasi === true) {
          $masuk = new Rooms;
          $masuk->rnumber = $request->rnumber;
          $masuk->statuses_id = $request->status;
          $masuk->type_id = $request->type;
          $masuk->timestamps = true;
          $masuk->save();
          return redirect('dashboard');

        }else {
          return redirect('dashboard')->withErrors($validasi);
        }
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
