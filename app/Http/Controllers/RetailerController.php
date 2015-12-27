<?php

namespace App\Http\Controllers;

use App\Retailer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RetailerController extends Controller
{
    public function index()
    {
        $retailers = Retailer::paginate(20);

        return view('retailer.list', compact('retailers'));
    }
}
