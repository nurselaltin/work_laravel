<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
      public function index(){

         $pages = Page::all();
        
         return view('back.Pages.index',compact('pages'));

      }

      public function switch(Request $request){

        $page = Page::findOrFail($request->id);
        $page->state = ($request->state == 'true') ? 1 : 0;
        $page->save();

      }
}
