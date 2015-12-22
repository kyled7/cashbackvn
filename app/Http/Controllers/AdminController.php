<?php

namespace App\Http\Controllers;


use App\Http\Requests;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
}
