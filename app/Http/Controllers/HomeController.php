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
            return view('home')->with('data', $users);
        }
        if (Auth::user()->user_type === 'patient') {
            $users = DB::table('patients')->where('email', $email)->first();
            $docs = DB::table('doctors')
                ->where('registration_status', 'approved')
                ->inRandomOrder()
                ->get();
            return view('home', compact('docs'))->with('data', $users);
        }
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
        return view('layouts.next_page.category', compact('category', 'rating'));
    }

    public function profile()
    {
        $email = Auth::user()->email;
        if (Auth::user()->user_type === 'doctor') {
            $users = DB::table('doctors')->where('email', $email)->first();
            return view('layouts.doctor.profile')->with('data', $users);
        }
        if (Auth::user()->user_type === 'patient') {
            $users = DB::table('patients')->where('email', $email)->first();
            return view('layouts.patient.profile')->with('data', $users);
        }
    }
}
