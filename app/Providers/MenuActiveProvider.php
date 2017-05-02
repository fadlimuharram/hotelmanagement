<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class MenuActiveProvider extends ServiceProvider
{
    public function boot()
    {
        $activedashboard='';$currentheader='';$currentinfo='';$activeroomsetting='';
        if (Request::segment(1)=='dashboard') {
          $activedashboard =' class="active"';
          $currentheader = 'Dashboard';
          $currentinfo = 'This is the status of the rooms';
        }elseif (Request::segment(1)=='RoomSettings') {
          $activeroomsetting = ' class="active"';
          $currentheader = 'Room Settings';
          $currentinfo = '';
        }elseif (Request::segment(1)=='profiles') {
          $currentheader = 'Profile';
          $currentinfo = '';
        }
        view()->share([
          'activedashboard'=>$activedashboard,
          'currentheader'=>$currentheader,
          'currentinfo'=>$currentinfo,
          'activeroomsetting'=>$activeroomsetting
        ]);
    }


    public function register()
    {
        //
    }
}
