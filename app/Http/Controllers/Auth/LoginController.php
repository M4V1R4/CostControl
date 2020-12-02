<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider($driver)
    {
        $drivers = ['facebook','google'];
        if(in_array($driver,$drivers)){
            return Socialite::driver($driver)->redirect();
        }else{
            return redirect()->route('login');
        }
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $driver)
    {
        if($request->get('error')){
            return redirect()->route('login');
        }
        
        $userSocialite = Socialite::driver($driver)->user();
        $user = User::where('email',$userSocialite->getEmail())->first();
        if(!$user){
            $user = User::create([
                        'name' => $userSocialite->getName(),
                        'email' => $userSocialite->getEmail(),
                    ]);
        }
        auth()->login($user);
        return redirect()->route('home');
    }
}
