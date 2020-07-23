<?php

namespace App\Http\Controllers\Back;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Articles::orderBy('created_at','desc')->get();

        return view('back.Articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('back.articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'min:3',
            'image'  => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $article = new Articles();
        $article->title = $request->title;
        $article->content = $request->icerik;
        $article->category_id = $request->category;
        $article->view = 0;
        $article->state = 1;
        $article->slug = Str::slug($request->title,'-');

        if($request->hasFile('image')){

            $imageName = $article->slug.'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $article->image = 'uploads/'.$imageName ;
        }
        $article->save();
        toastr()->success('Makale başarıyla oluşturuldu!', 'Başarılı');
        return redirect()->route('admin.makaleler.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $article = Articles::findOrFail($id);
        $categories = Category::all();
        return view('back.Articles.update',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title'  => 'min:3',
            'image'  => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);


        $article = Articles::findOrFail($id);
        $article->title = $request->title;
        $article->content = $request->icerik;
        $article->category_id = $request->category;
        $article->view = 0;
        $article->state = 1;
        $article->slug = Str::slug($request->title,'-');

        if($request->hasFile('image')){

            $imageName = $article->slug.'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $article->image = 'uploads/'.$imageName ;
        }
        $article->save();
        toastr()->success('Makale başarıyla güncellendi!', 'Başarılı');
        return redirect()->route('admin.makaleler.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public  function  delete($id){
        Articles::findOrFail($id)->delete();
        toastSuccess('Makale silinen makalelere taşındı');
        return redirect()->route('admin.makaleler.index');

    }

    public  function  trashed(){

        $articles =  Articles::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('back.Articles.trashed',compact('articles'));
    }

    public  function recover($id){

        Articles::onlyTrashed()->find($id)->restore();
        toastSuccess('Makale kurtarıldı');
        return redirect()->back();
    }

    public  function  hardDelete($id){

        $article = Articles::onlyTrashed()->find($id);
        //yazıya ait resime de silelim
        if(File::exists($article->image)){
            File::delete(public_path($article->image));
        }
        //Veritabanından yazıyı sil
        $article->forceDelete();
        toastSuccess('Sayfa başarıyla silindi');
        return redirect()->back();
    }

    public  function  switch(Request $request){
        $article = Articles::findOrFail($request->id);
        $article->state = $request->state=='true' ? 1 : 0;
        $article->save();
    }
}
