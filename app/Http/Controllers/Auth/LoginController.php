<?php

namespace LinkLater\Http\Controllers\Auth;

use LinkLater\Http\Controllers\Controller;
use LinkLater\Eloquent\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Hash;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        // Create or fetch user
        $foundUser = User::where([
            'name' => $user->name,
            'email' => $user->email
        ])->first();
        if (!$foundUser) {
            $foundUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make(str_random(20)),
            ]);
        }

        // Log user in
        Auth::login($foundUser);

        // Redirect back to home page
        return redirect('/home');
    }
}
