<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function about()
    {
        return 123;
    }

    public function test()
    {
        //event(new \App\Events\OrderEvent('aaaaaaaa'));
        //return \App\Models\User::query()->first()->unreadNotifications;
        $data = \App\Models\User::query()->find(3)->posts;

        return view('about',compact('data'));
       // return \App\Models\User::query()->first()->Notifications;
    }

    public function home()
    {

        $data = User::query()->cursor();
        return view('welcome')->with('data',$data);
    }
}
