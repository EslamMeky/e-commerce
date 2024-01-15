<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CartController extends Controller
{
    public function cart()
    {
        return view('Front.cart');

    }
    public function addCart($id)
    {
        try
        {
            $product=SubCategory::find($id);
            if (!$product)
            {
                return redirect()->route('products')->with(['error'=>'Not Found This Product ']);
            }
            $cart=session()->get('cart',[]);
            if (isset($cart[$id])){
                $cart[$id]['Quantity']++;
            }else
            {
                $cart[$id]=[
                    'product_name'=>$product->name_en,
                    'photo'=>$product->photo,
                    'price'=>$product->price,
                    'quantity'=>1,
                    'size'=>0,
                ];
            }

            session()->put('cart',$cart);
            return redirect()->route('products')->with(['success'=>'Product add to cart successfully']);

        }
        catch (\Exception $ex)
        {
            return redirect()->route('products')->with(['error'=>'SomeThing Error Try again Later ']);

        }
    }



    public function removeCart(Request $request)
    {
        if ($request->id){
            $cart =session()->get('cart');
            if (isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','product successfully removed!');
        }
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity){
            $cart=session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success','Cart successfully updated!');
        }
    }




}
