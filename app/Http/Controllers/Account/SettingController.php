<?php

namespace App\Http\Controllers\Account;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function getIndex()
    {
        return view('account.setting.index');
    }

    public function postUpdate(Request $request)
    {
        $user = \Auth::user();

        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $user->fill($request->all())->save();

        Session::flash('message', 'Successfully update user info!');
        return redirect()->to('account');
    }

    public function postChangepassword(Request $request)
    {
        $user = \Auth::user();

        \Validator::extend('passcheck', function ($attribute, $value, $parameters)
        {
            return \Hash::check($value, \Auth::user()->getAuthPassword());
        });

        $this->validate($request, [
            'origin_password' => 'required|passcheck',
            'password' => 'required|confirmed|min:6'
        ]);

        $user->password = bcrypt($request->password);

        $user->save();

        Session::flash('message', 'Successfully change password!');
        return redirect()->to('account');
    }
}
