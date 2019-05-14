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
        }
        if (Auth::user()->user_type === 'patient') {
            $users = DB::table('patients')->where('email', $email)->first();
        }
        return view('home')->with('data', $users);
    }

    public function category($category_name)
    {
        if ($category_name === 'physician') {
            $type = 0;
        }
        else {
            $type = 1;
        }

        $category = DB::table('doctors')->where('category', $type)->get();
        $rating = DB::table('doctors')->where('category', $type)->orderBy('rating', 'desc')->take(2)->get();
        return view('layouts.patient.category', compact('category', 'rating', 'email'));
    }

    public function profile($cat_email) {
        return 'Hello';
    }
}
