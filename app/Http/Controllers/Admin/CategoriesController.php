<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MainCategoryRequest;
use App\Models\Admin;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function create_category()
    {
        return view('Admin.categories.create');
    }

    public function store_category(MainCategoryRequest $request)
    {
        try
        {
            $path_file=uploadImage('MainCategories',$request->photo);
            MainCategory::create([
                'photo'=>$path_file,
                'name_ar'=>$request->name_ar,
                'name_en'=>$request->name_en,
            ]);
            return redirect()->route('create.category')->with(['success'=>'Added Done']);
        }
        catch (\Exception $ex)
        {
            return redirect()->route('create.category')->with(['error'=>'SomeThing Incorrect Try Again Later']);
        }
    }

    public function show_category()
    {
        try
        {
            $categories=MainCategory::selection()->paginate(PAGINATE);
            return view('Admin.categories.show',compact('categories'));

        }
        catch (\Exception $ex)
        {
            return redirect()->route('show.category')->with(['error'=>'SomeThing Incorrect Try Again Later']);

        }
    }

    public function edit_category($id)
    {
        try
        {
            $category=MainCategory::find($id);
            if (!$category)
                return redirect()->route('show.category')->with(['error'=>'Not Found This Category ']);

            return view('Admin.categories.edit',compact('category'));

        }
        catch (\Exception $ex)
        {
            return redirect()->route('show.category')->with(['error'=>'SomeThing Incorrect Try Again Later']);

        }
    }


    public function update_category($id,MainCategoryRequest $request)
    {
        try
        {
            $category=MainCategory::find($id);
            if (!$category)
                return redirect()->route('show.category')->with(['error'=>'Not Found This Category ']);
            MainCategory::where('id',$id)->update([
                'name_ar'=>$request->name_ar,
                'name_en'=>$request->name_en,
            ]);
            if ($request->has('photo'))
            {
                $path_file=uploadImage('MainCategories',$request->photo);
                MainCategory::where('id',$id)->update([
                    'photo'=>$path_file,
                ]);
            }

            return redirect()->route('show.category')->with(['success'=>'Updated Done']);

        }   catch (\Exception $ex)
        {
            return redirect()->route('show.category')->with(['error'=>'SomeThing Incorrect Try Again Later']);

        }
    }


    public function delete_category($id)
    {
        try
        {
           $category= MainCategory::find($id);
           if (!$category)
               return redirect()->route('show.category')->with(['error'=>'Not Found This Category ']);

           $image=Str::after($category->photo,'assets/');
           $image=base_path('public/assets/'.$image);
           unlink($image);
           $category->delete();
            return redirect()->route('show.category')->with(['success'=>'Deleted Done']);

        }
        catch (\Exception $ex)
        {
            return redirect()->route('show.category')->with(['error'=>'SomeThing Incorrect Try Again Later']);

        }
    }

}
