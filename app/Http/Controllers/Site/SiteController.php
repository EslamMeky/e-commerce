<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\FeedbackRequest;
use App\Http\Requests\Site\SubscribeRequest;
use App\Models\Cart;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\SubCategory;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SiteController extends Controller
{



    public function subscribe(SubscribeRequest $request)
    {
        try
        {
            Subscribe::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'code'=>$request->code,
            ]);
            return redirect()->route('home')->with(['success'=>('Added Done Subscribe')]);
        }
        catch (\Exception $ex)
        {
            return redirect()->route('home')->with(['error'=>'Some Thing Wrong Try Again Later']);

        }
    }

    public function feedback(FeedbackRequest $request)
    {
        try
        {
            Feedback::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'feedback'=>$request->feedback,
            ]);
            return redirect()->route('about')->with(['success'=>('Added Done FeedBack')]);
        }
        catch (\Exception $ex)
        {
            return redirect()->route('about')->with(['error'=>'Some Thing Wrong Try Again Later']);
        }
    }


    public function sendCart(Request $request)
    {
        $data=[];
//        $num=rand(0,10000);
        $key='processed';
        $user=Auth::user();
//        $name=$user->name;
//        $mobile=$user->mobile;
//        $address=$user->address;

        $order=Order::create([
            'user_id'=>$user->id,
        ]);
        foreach( session('cart') as $id=>$details){

            Cart::create([
                'order_id'=>$order->id,
                'items'=>$details['product_name'],
                'total'=>$details['price'],
                'status'=>$key,
                'quy'=>$details['quantity'],


            ]);

        }
        $cart =session()->get('cart');
        unset($cart);
        session()->put('cart');
        return redirect()->route('cart')->with(['success'=>' You will receive your order soon']);




    }

}
