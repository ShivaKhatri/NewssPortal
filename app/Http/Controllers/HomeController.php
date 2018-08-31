<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image=DB::table('images')->select('image')->orderBy('order')->get();
        $article=DB::table('articles')->select('articles.*')->where('status','=',1)->orderBy('created_at','desc')->limit(4)->get();
        $category=DB::table('categories')->select('categories.*')->where('status','=',1)->orderBy('created_at','desc')->get();
        $breakingNews=DB::table('breaking_news')->select('breaking_news.*')->where('status','=',1)->orderBy('created_at','desc')->get();
        $articleReview=DB::table('testimonials')->select('testimonials.*',DB::raw("DATE_FORMAT(created_at,'%M %d, %Y') as date"))->where([['status','=','1'],['type','=','voice']])->orderBy('created_at','desc')->get();
        $literatureReview=DB::table('testimonials')->select('testimonials.*',DB::raw("DATE_FORMAT(created_at,'%M %d, %Y') as date"))->where([['status','=','1'],['type','=','literature']])->orderBy('created_at','desc')->get();
        $sortHeading=DB::table('sort_headings')->select('sort_headings.*',DB::raw("DATE_FORMAT(created_at,'%M %d, %Y') as date"))->where('status','=','1')->orderBy('order','asc')->get();
        $ads=DB::table('ads')->select('ads.*',DB::raw("DATE_FORMAT(created_at,'%M %d, %Y') as date"))->where('status','=','1')->orderBy('order','asc')->get();

        return view('welcome')->with('image',$image)->with('article',$article)->with('category',$category)->with('breakingNews',$breakingNews)->with('articleReview',$articleReview)->with('literatureReview',$literatureReview)->with('sortHeading',$sortHeading)->with('ads',$ads);
    }
}
