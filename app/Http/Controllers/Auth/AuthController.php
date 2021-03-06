<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/';
    protected $loginPath = '/user/login';

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (Input::get('redirect')) {
            return Input::get('redirect');
        }

        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function getFacebookHandler()
    {
        $this->socialiteHandler('facebook');
    }

    public function getTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function getTwitterHandler()
    {
        $this->socialiteHandler('twitter');
    }

    private function socialiteHandler($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $userCheck = User::where('provider', $provider)->where('social_id', $socialUser->getId())->first();

        if ($userCheck) {
            Auth::login($userCheck, true);
        }
        else {
            $user = User::create([
                'name' => $socialUser->getName(),
                'provider' => $provider,
                'social_id' => $socialUser->getId()
            ]);
            Auth::login($user, true);
        }
    }
}
