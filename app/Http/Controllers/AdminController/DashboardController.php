<?php

namespace App\Http\Controllers\AdminController;

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
        return view('backend.adminDashboard.index', compact('data'));

    }
}
