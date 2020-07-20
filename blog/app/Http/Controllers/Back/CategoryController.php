<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    
      public function index(){

          $categories = Category::orderBy('created_at','desc')->get();
    
          return view('back.Categories.index',compact('categories'));
      }

      public function switch(Request $request){

          $category = Category::findOrFail($request->id);
          $category->state = $request->state == 'true' ? 1: 0;
          $category->save();

      }



      public function getData(Request $request){
         $category = Category::findOrFail($request->id);
         return response()->json($category);
      }

      public function update(Request $request){

       
        //Bu id dışındaki idlerde bu slug var mı ara?
         $isExist = Category::whereName($request->name)->whereNotIn('id',[$request->id])->first();
         
         //varsa geri döndür
         if($isExist){
            toastr()->error($request->name.' adında zaten kategori mevcut!');
            return redirect()->back();
         }

         $category = Category::findOrFail($request->id);
         $category->name = $request->name;
         $category->slug = Str::slug($request->name,'-');
         $category->save();
         toastr('Kategori başarıyla güncellendi!');

         return redirect()->route('admin.category.index');

      }


      public function create(Request $request){
          
        $isExist = Category::whereSlug(Str::slug($request->category_name))->first();

        if($isExist){
        
            toastr()->error($request->category_name.' adında zaten kategori mevcut!');
            return redirect()->back();

        }
          
          $category = new Category();
          $category->name = $request->category_name;
          $category->slug = Str::slug($request->category_name,'-');
          $category->save();
          toastr('Kategori başarıyla eklendi!');

          return redirect()->route('admin.category.index');
         
      }

}
