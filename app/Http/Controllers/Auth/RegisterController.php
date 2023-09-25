<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User; // Make sure to import the User model
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $roles = config('roles'); // Get the roles from the configuration file
        return view('auth.register', compact('roles'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:admin,editor,usuario'], // Add validation for the role
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'], // Store the selected role in the 'role' column
        ]);
    }

    

    protected function registered(Request $request, $user)
    {
        if ($user->role === 'usuario') {
            return redirect()->route('home-usuario'); 
        }
        if ($user->role === 'admin') {
            return redirect()->route('admin-usuario'); 
        }
        if ($user->role === 'editor') {
            return redirect()->route('editor-usuario'); 
        }

        // For other roles or as a fallback, redirect to the default home route
        return redirect('/home');
    }
}
