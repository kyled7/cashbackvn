<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RedeemController extends Controller
{
    public function getIndex()
    {
        $histories = \Auth::user()->account_balance->history()
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return view('account.redeem.index', compact('histories'));
    }
}
