<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Retailer;

class HomeController extends Controller
{
    public function index()
    {
        $retailers = Retailer::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        return view('home', compact('retailers'));
    }
}
