<?php

namespace App\Http\Controllers\Front;

use App\Models\Articles;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Mail;


class Homepage extends Controller
{
    function __construct()
    {

        view()->share('pages',Page::orderBy('created_at','ASC')->get());
        view()->share('categories', Category::inRandomOrder()->get());
        if(Setting::find(1)->active == 0){

            return redirect()->to('site-bakimda')->send();
        };
    }

    function  index(){

       $data['categories']= Category::inRandomOrder()->get();
       $data['articles']  = Articles::orderBy('created_at','DESC')->paginate(2);
       $data['articles']->withPath(url('sayfa'));

          return view('front.homepage',$data);
    }

    public  function singlePost($category,$slug){

        //category var mı kontrol et?
        $category = Category::whereSlug($category)->first() ?? abort(403,'Böyle bir kategori bulunamadı.');

        //slug var mı kontrol et?,Kategoriye ait yazı var mı kontrol et
        $article = Articles::where('slug',$slug)->whereCategoryId($category->id)->first() ?? abort(403,'Böyle bir yazı bulunamadı.');
        //where ile sütün adını direk birleştererekte yapabiliriz
        //$data['article']  = Articles::whereSlug($slug)->first() ?? abort(403,'Sanırım kayboldun');
        $article->increment('view');
        $data['article'] = $article;
        return view('front.singlePost',$data);
    }

    public  function categoriesPost($category_slug){

        $category = Category::whereSlug($category_slug)->first() ?? abort(403,'Böyle bir kategori bulunamadı.');
        $data['articles'] = Articles::whereCategoryId($category->id)->orderBy('created_at','DESC')->paginate(2) ;
        $data['category'] = $category;

        return view('front.categoriesPost',$data);
    }

    public  function  pages($slug){
           $page = Page::whereSlug($slug)->first() ?? abort(403,'Böyle bir sayfa bulunamadı.');
           $data['page'] = $page;
        return view('front.pages',$data);
    }

    public  function  contact(){

        return view('front.contact');
    }
    public  function  contactPost(Request  $request){



         Mail::send([],[],function ($message) use($request){
             $message->from('iletisim@hotmail.com','Blog Sitesi');
             $message->to('nursel@hotmail.com');
             $message->setBody('Mesajı gönderen :'.$request->fullname.'</br>
                                Mesajı Gönderen Mail : '.$request->email.'<br/>
                                Mesaj Konusu: '.$request->topic.'<br/>
                                Mesaj : '.$request->message.'<br/>
                                Mesaj Gönderilme Tarihi:'.now().'','text/html'
                                );
             $message->subject($request->fullname.' tarafından mesaj gönderildi');
         });


        $contact = new Contact;
       /*$contact->fullname = $request->fullname;
       $contact->email = $request->email;
       $contact->message = $request->message;
       $contact->konu = $request->konu;
       $contact->save();*/
        return redirect()->route('contact')->with('success','Mesajınız bize iletildi.Teşekkür ederiz.');


    }
}
