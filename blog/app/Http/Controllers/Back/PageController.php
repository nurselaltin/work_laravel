<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Page;

class PageController extends Controller
{
      public function index(){

         $pages = Page::all();
        
         return view('back.Pages.index',compact('pages'));

      }

      public  function  create(){

          return view('back.Pages.create');
      }

      public function post(Request $request)
    {
        $request->validate([
            'title'  => 'min:3',
            'image'  => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $slug = Str::slug($request->title,'-');
        //Aynı slug  değerinden var mı ?
         $isExist = Page::whereSlug($slug)->first();
         if($isExist){

             toastr()->error($request->title.' başlığında  adı altında zaten sayfa  mevcut!', 'Hata');
             return redirect()->back();
         }

        $lastorder = Page::orderBy('order','desc')->first();
        $page = new Page();
        $page->title = $request->title;
        $page->content = $request->icerik;
        $page->state = 1;
        $page->order = $lastorder->order + 1;
        $page->slug = $slug;

        if($request->hasFile('image')){

            $imageName = $page->slug.'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $page->image = 'uploads/'.$imageName ;
        }
        $page->save();
        toastr()->success('Sayfa başarıyla oluşturuldu!', 'Başarılı');
        return redirect()->route('admin.page.index');
    }

      public function  edit($id){

          $page = Page::findOrFail($id)->first();
          return view('back.Pages.update',compact('page'));
      }

      public  function  update(Request $request,$id){


          $request->validate([
              'title'  => 'min:3',
              'image'  => 'image|mimes:jpeg,png,jpg|max:2048'
          ]);


         $page = Page::findOrFail($id);
         $page->title = $request->title;
         $page->content = $request->icerik;
         $page->slug = Str::slug($request->title,'-');

          if($request->hasFile('image')){

              $imageName =$page->slug.'.'.$request->image->getClientOriginalExtension();
              $request->image->move(public_path('uploads'),$imageName);
             $page->image = 'uploads/'.$imageName ;
          }
         $page->save();
          toastr()->success('Sayfa başarıyla güncellendi!', 'Başarılı');
          return redirect()->route('admin.page.index');
      }

      public  function  delete($id){
          $page = Page::find($id);
          //yazıya ait resime de silelim
          if(File::exists($page->image)){
              File::delete(public_path($page->image));
          }
          //Veritabanından yazıyı sil
          $page->forceDelete();
          return redirect()->back();
      }

      public function switch(Request $request){

        $page = Page::findOrFail($request->id);
        $page->state = ($request->state == 'true') ? 1 : 0;
        $page->save();

      }


}
