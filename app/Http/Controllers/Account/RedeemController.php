<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RedeemController extends Controller
{
    public function getIndex()
    {
        $histories = \Auth::user()->account_balance->history()
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $pending_redeem_request = \Auth::user()->pending_redeem_request;
        $confirm_message = trans('message.redeem_cancel_confirm');
        return view('account.redeem.index', compact('histories', 'pending_redeem_request', 'confirm_message'));
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'requested_amount' => 'required|numeric|min:100000|max:' . \Auth::user()->available_amount
        ]);

        $request->merge(['status' => 'submitted']);

        \Auth::user()->redeem_request()->create($request->all());

        Session::flash('message', trans('message.redeem_request_submitted_message'));
        return redirect()->action('Account\RedeemController@getIndex');
    }

    public function patchUpdate(Request $request, $id)
    {
        $redeem_request = \Auth::user()->redeem_request()->findOrFail($id);
        $this->validate($request, [
            'requested_amount' => 'required|numeric|min:100000|max:' . \Auth::user()->available_amount
        ]);

        $redeem_request->fill($request->all())->save();

        Session::flash('message', trans('message.redeem_request_updated_message'));
        return redirect()->action('Account\RedeemController@getIndex');
    }

    public function deleteDestroy($id)
    {
        $redeem_request = \Auth::user()->redeem_request()->findOrFail($id);
        $redeem_request->delete();

        Session::flash('message', trans('message.redeem_request_deleted_message'));
        return redirect()->action('Account\RedeemController@getIndex');
    }
}
