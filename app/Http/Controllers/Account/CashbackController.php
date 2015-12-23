<?php

namespace App\Http\Controllers\Account;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class CashbackController extends Controller
{

    /**
     * Account cashback index
     */
    public function getIndex()
    {
        $transactions = \Auth::user()->transactions()
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return view('account.cashback.index', compact('transactions'));
    }
}
