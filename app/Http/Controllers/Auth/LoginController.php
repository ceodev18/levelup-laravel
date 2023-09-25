<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
    

    protected function authenticated(Request $request, $user)
    {   
        dd('authenticated called'); 
        if ($user->isAdmin()) {
            // If the user is an admin, redirect to the admin dashboard
            return redirect('/admin-usuario');
        } elseif ($user->isEditor()) {
            // If the user is an editor, redirect to the editor dashboard
            return redirect('/editor-usuario');
        } else {
            // Default redirection for other users (e.g., regular users)
            return redirect('/home-usuario');
        }
    }
}
