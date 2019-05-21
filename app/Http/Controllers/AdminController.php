<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('preventBackHistory');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    public function add_doctor(Request $request) {

        $this->validate($request, [
            'contact' => 'required|string',
            'birth_date' => 'required|date|date_format:Y-m-d',
            'country'=> 'required|string',
            'state'=> 'required|string',
            'address'=> 'required|string',
            'first_name'   => 'required|string',
            'last_name' => 'required|string',
            'citizenship'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'certificate'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'experience'=> 'required|integer',
            'category'=> 'required|integer',
            'gender'=> 'required|string',
            'cur_work'=> 'required|string',
            'prev_work'=> 'required|string',
            'email' => 'required|string',
            'password' => 'required|string', 
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $profile_img = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/doctor/profile/');
            $image->move($destinationPath, $profile_img);
        }

        if ($request->hasFile('citizenship')) {
            $image = $request->file('citizenship');
            $citizenship_img = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/doctor/citizenship/');
            $image->move($destinationPath, $citizenship_img);
        }
        
        if ($request->hasFile('certificate')) {
            $image = $request->file('certificate');
            $certificate_img = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/doctor/certificate');
            $image->move($destinationPath, $certificate_img);
        }

        App\User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'user_type' => 'doctor',
                'name' => $request->first_name,
            ]);

        App\Doctor::create([
                'contact' => $request->contact,
                'birth_date' => $request->birth_date,
                'country'=> $request->country,
                'state'=> $request->state,
                'address'=> $request->address,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'citizenship' => $citizenship_img,
                'certificate' => $certificate_img,
                'image' => $profile_img,
                'experience' => $request->experience,
                'category' => $request->category,
                'gender'=> $request->gender,
                'cur_work'=> $request->cur_work,
                'prev_work'=> $request->prev_work,
                'submit_status' => 'submitted',
                'registration_status' => 'approved',
                'email' => $request->email,
                ]);

        return view('admin');
    }
}
