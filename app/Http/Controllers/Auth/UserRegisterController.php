<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class UserRegisterController extends Controller
{
    public function update_doctor(Request $request)
    {
        $email = Auth::user()->email;
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

        DB::table('doctors')
            ->where('email', $email)
            ->update([
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
                ]);
                
        $users = DB::table('doctors')->where('email', $email)->first();
        return view('home')->with('data', $users);
    }

    public function update_patient(Request $request)
    {
        $email = Auth::user()->email;
        $this->validate($request, [
            'contact' => 'required|string',
            'birth_date' => 'required|date|date_format:Y-m-d',
            'country'=> 'required|string',
            'state'=> 'required|string',
            'address'=> 'required|string',
            'first_name'   => 'required|string',
            'last_name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'gender'=> 'required|string',
            'cur_work'=> 'required|string',
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $profile_img = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/patient/profile/');
            $image->move($destinationPath, $profile_img);
        }

        DB::table('patients')
            ->where('email', $email)
            ->update([
                'contact' => $request->contact,
                'birth_date' => $request->birth_date,
                'country'=> $request->country,
                'state'=> $request->state,
                'address'=> $request->address,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'image' => $profile_img,
                'gender'=> $request->gender,
                'cur_work'=> $request->cur_work,
                'submit_status' => 'submitted',
                ]);
                
        $users = DB::table('patients')->where('email', $email)->first();    
        $docs = DB::table('doctors')->where('email', $email)
            ->where('registration_status', 'approved')
            ->inRandomOrder()
            ->get();
        return view('home')->with('data', $users, 'docs', $docs);
    }
}
