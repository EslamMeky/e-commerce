<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function showOrder()
    {

       $orders= Cart::with('order.users')->select('id','order_id','items','quy','total','status','created_at','updated_at')->paginate(PAGINATE);
       return view('Admin.orders.show',compact('orders'));
//        return dd($orders);
    }

    public function deleteOrder($id)
    {
        try {
            $order= Cart::find($id);
            if (!$order){
                return redirect()->route('show.order')->with(['error'=>'Not Found This Order']);
            }
            $order->delete();
            return redirect()->route('show.order')->with(['success'=>'Deleted Order ! ']);
        }
        catch (\Exception $ex){
            return redirect()->route('show.order')->with(['error'=>'SomeThing Wrong Try Again Later']);
        }

    }

    public function updateOrder($id)
    {
        try {
            $order= Cart::find($id);
            if (!$order){
                return redirect()->route('show.order')->with(['error'=>'Not Found This Order']);
            }
            $status=$order->status=='processed'? 'done':'processed';
            $order->update(['status'=>$status]);
            return redirect()->route('show.order')->with(['success'=>'ChangeStatus Done']);

        }
        catch (\Exception $ex)
        {
            return redirect()->route('show.order')->with(['error'=>'SomeThing Wrong Try Again Later']);

        }
    }


    public function showFeedback()
    {
     $feeds=Feedback::select('name','email','feedback','created_at')->paginate(PAGINATE);
     return view('Admin.contact.showFeedback',compact('feeds'));
    }

    public function showSubscribe()
    {
        $subs=Subscribe::select('name','email','code','created_at')->paginate(PAGINATE);
        return view('Admin.contact.showSubscribe',compact('subs'));
    }
}
