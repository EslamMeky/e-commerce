<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class PaymobController extends Controller
{

    public function pay(){
        return view('Front.Paymob');
    }

    public function state(){
        $data=request()->query();
        $id=$data['id'];
        $order=$data['order'];
        $success=$data['success'];
        $pending=$data['pending'];
        $hmac=$data['hmac'];
        return view('Front.state',compact(['id','order','success','pending','hmac']));
    }
}
