<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page']='Dashboard';
        return view('layout/page', compact('data'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->action('HomeController@index');
    }
}
