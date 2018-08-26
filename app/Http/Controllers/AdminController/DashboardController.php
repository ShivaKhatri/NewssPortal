<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Article;
use App\Models\BreakingNews;
use App\Models\Image;
use App\Models\Testimonials;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Feeds;
use YahooWeather;

class DashboardController extends Controller
{
    public function index()
    {

        $feed = Feeds::make('http://blog.case.edu/news/feed.atom', true); // if RSS Feed has invalid mime types, force to read
        $data = array(
            'title' => $feed->get_title(),
            'permalink' => $feed->get_permalink(),
            'items' => $feed->get_items(),
        );
//dd($data);
        $weather =  YahooWeather::Country('kathmandu','ar');
//        $weather=YahooWeather::Country('nepal','en');
//       dd($weather);
        $mainstories = Article::select('id')->where('status', '=', 1)->count();
        $breakingNews = BreakingNews::select('id')->where('status', '=', 1)->count();
        $voice = Testimonials::select('id')->where('type', '=', 'voice')->where('status', '=', 1)->count();
        $literature = Testimonials::select('id')->where('type', '=', 'literature')->where('status', '=', 1)->count();
        $imageOfMonth= Image::select('id')->where('status', '=', 1)->count();
        $videos = Video::select('id')->where('status', '=', 1)->count();
        return view('backend.adminDashboard.index', compact('data','weather','mainstories','breakingNews','voice','literature','imageOfMonth','videos'));

    }
}
