<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $this->middleware('preventBackHistory');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $email = Auth::user()->email;
        if (Auth::user()->user_type === 'doctor') {
            $users = DB::table('doctors')->where('email', $email)->first();
            // dd($users);
        }
        if (Auth::user()->user_type === 'patient') {
            $users = DB::table('patients')->where('email', $email)->first();
        }
        return view('home')->with('data', $users);
    }
}
