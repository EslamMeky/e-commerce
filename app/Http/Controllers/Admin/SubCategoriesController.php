<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Monolog\Handler\IFTTTHandler;

class SubCategoriesController extends Controller
{
//
    public function create_subCategory()
    {
       $categories = MainCategory::selection()->get();
       return view('Admin.subCategories.create',compact('categories'));
    }

    public function store_subCategory(SubCategoryRequest $request)
    {
        try
        {
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            $path_file=uploadImage('SubCategories',$request->photo);
         SubCategory::create([
             'photo'=>$path_file,
             'name_ar'=>$request->name_ar,
             'name_en'=>$request->name_en,
             'active'=>$request->active,
             'category_id'=>$request->category_id,
             'price'=>$request->price,
             'description_ar'=>$request->description_ar,
             'description_en'=>$request->description_en,

         ]);
         return redirect()->route('create.subCategory')->with(['success'=>'Added Done']);

        }
        catch (\Exception $ex)
        {
            return redirect()->route('create.subCategory')->with(['error'=>'SomeThing Incorrect Try Again Later']);
        }
    }

    public function show_subCategory()
    {
        try
        {
           $categories=SubCategory::selection()->paginate(PAGINATE);
            return view('Admin.subCategories.show',compact('categories'));
        }
        catch (\Exception $ex)
        {
            return redirect()->route('show.subCategory')->with(['error'=>'SomeThing Incorrect Try Again Later']);
        }
    }

    public function edit_subCategory($id)
    {
        try
        {
            $subcategory=SubCategory::selection()->find($id);
            $categories=MainCategory::selection()->get();
            if (!$subcategory)
                return redirect()->route('show.subCategory')->with(['error'=>'Not Found This Category']);
            return view('Admin.subCategories.edit',compact('subcategory','categories'));
        }
        catch(\Exception $ex)
        {
            return redirect()->route('show.subCategory')->with(['error'=>'SomeThing Incorrect Try Again Later']);

        }
    }

    public function update_subCategory($id,SubCategoryRequest $request)
    {
        try
        {
            DB::beginTransaction();

            $category=SubCategory::find($id);
         if (!$category)
             return redirect()->route('show.subCategory')->with(['error'=>'Not Found This Category']);

         if ($request->has('photo'))
         {
             $path_file = uploadImage('SubCategories', $request->photo);
             SubCategory::where('id', $id)->update([
                 'photo' => $path_file,
             ]);
         }
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);


            SubCategory::where('id',$id)->update([
             'name_ar'=>$request->name_ar,
             'name_en'=>$request->name_en,
             'active'=>$request->active,
             'category_id'=>$request->category_id,
              'price'=>$request->price,
                'description_ar'=>$request->description_ar,
                'description_en'=>$request->description_en,
         ]);
         DB::commit();
         return redirect()->route('show.subCategory')->with(['success'=>'Updated Done']);




        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('show.subCategory')->with(['error'=>'SomeThing Incorrect Try Again Later']);

        }
    }




    public function delete_subCategory($id)
    {
        try
        {
           $category= SubCategory::find($id);
           if (!$category)
               return redirect()->route('show.subCategory')->with(['error'=>'Not Found This Category']);

           $image=Str::after($category->photo,'assets/');
           $image=base_path('public/assets/'.$image);
           unlink($image);
           $category->delete();
           return redirect()->route('show.subCategory')->with(['success'=>'Deleted Done']);

        }
        catch (\Exception $ex)
        {
            return redirect()->route('show.subCategory')->with(['error'=>'SomeThing Incorrect Try Again Later']);

        }
    }

    public function changeStatus_subCategory($id)
    {
        try
        {
            $category=SubCategory::find($id);
            if (!$category)
                return redirect()->route('show.subCategory')->with(['error'=>'Not Found This Category']);
            $status=$category->active==0? 1:0;
            $category->update(['active'=>$status]);
            return redirect()->route('show.subCategory')->with(['success'=>'ChangeStatus Done']);

        }
        catch (\Exception $ex)
        {

            return redirect()->route('show.subCategory')->with(['error'=>'SomeThing Incorrect Try Again Later']);
        }
    }

    public function search(Request $request)
    {
        if ( $request->has('search')){
            $search=$request->get('search') ;
            $categories=SubCategory::where('id','LIKE',"%".$search."%")->paginate(20);
             return view('Admin.subCategories.show',compact('categories'));

        }
        else{
            return redirect()->route('show.subCategory')->with(['error'=>'Noting In Filed']);
        }
    }




}
