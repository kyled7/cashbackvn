<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Banner;
use App\Models\Retailer;

class HomeController extends Controller
{
    public function index()
    {
        $retailers = Retailer::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        $carousels = Banner::where('status', 'active')
            ->where('valid_from', '<', 'NOW()')
            ->where(function ($query) {
                $query->where('expired_at', '0000-00-00 00:00:00')
                    ->orWhere('expired_at', '>', 'NOW()');
            })
            ->get();

        return view('home', compact('retailers', 'carousels'));
    }
}
