<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function usuario()
    {
        return view('homeview.home-usuario');
    }

    public function admin()
    {
        return view('homeview.admin-usuario');
    }

    public function editor()
    {
        return view('homeview.editor-usuario');
    }
}
