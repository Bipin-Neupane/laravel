<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use \Pusher\Pusher;

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
            return view('home')->with('data', $users);
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

    public function authenticate(Request $request) {
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;

        $pusher = new Pusher('074d818400dba417dcfd', 'f7d4051e2f1b07ac28c8', '790050', [
            'cluster' => 'ap2',
            'encrypted' => true,
        ]);

        $presence_data = ['name' => auth()->user()->name];
        $key = $pusher->presence_auth($channelName, $socketId, auth()->id(), $presence_data);

        return response($key);
    }

}
