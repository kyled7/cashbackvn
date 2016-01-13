<?php

namespace App\Http\Controllers;

use App\Models\Retailer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RetailerController extends Controller
{
    /**
     * List all retailers
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $retailers = Retailer::paginate(20);

        return view('retailer.list', compact('retailers'));
    }

    /**
     * View retailer detail
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($slug)
    {
        $retailer = Retailer::findBySlugOrFail($slug);

        return view('retailer.details', compact('retailer'));
    }

    public function redirect($slug)
    {
        $retailer = Retailer::findBySlugOrFail($slug);

        return view('retailer.redirect', compact('retailer'));
    }
}
