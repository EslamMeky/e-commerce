<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class HomeController extends Controller
{

    public function home()
    {
        $mens=SubCategory::where(['category_id'=>2,'active'=>1])->select('id','name_'.LaravelLocalization::getCurrentLocale().' as name',
        'price','photo')->paginate(PAGINATE);
        $womens=SubCategory::where(['category_id'=>4,'active'=>1])->select('id','name_'.LaravelLocalization::getCurrentLocale().' as name',
            'price','photo')->paginate(PAGINATE);
        $kids=SubCategory::where(['category_id'=>3,'active'=>1])->select('id','name_'.LaravelLocalization::getCurrentLocale().' as name',
            'price','photo')->paginate(PAGINATE);
        $accessories=SubCategory::where(['category_id'=>5,'active'=>1])->select('id','name_'.LaravelLocalization::getCurrentLocale().' as name',
            'price','photo')->paginate(PAGINATE);
        return view('Front.home',compact('mens','womens','kids','accessories'));
    }


    public function about()
    {
        return view('Front.about');
    }


    public function products()
    {
        $mens=SubCategory::select('id','name_'.LaravelLocalization::getCurrentLocale().' as name',
            'price','photo',
        'description_'.LaravelLocalization::getCurrentLocale().' as description')->paginate(15);
        return view('Front.products',compact('mens',));
    }

    public function search_product(Request $request)
    {
        if ( $request->has('search')){
            $search=$request->get('search') ;
            $mens=SubCategory::select('id','name_'.LaravelLocalization::getCurrentLocale().' as name',
                'price','photo',
                'description_'.LaravelLocalization::getCurrentLocale().' as description')->where('name_en','LIKE',"%".$search."%")->
            orwhere('name_ar','LIKE',"%".$search."%")->paginate(20);
            return view('Front.products',compact('mens'));

        }
        else{
            return redirect()->route('products')->with(['error'=>'Noting In Filed']);
        }
    }



    public function contact()
    {
        return view('Front.contact');

    }


}
