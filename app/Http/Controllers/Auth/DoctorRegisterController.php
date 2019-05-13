<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class DoctorRegisterController extends Controller
{
    public function update(Request $request)
    {
        $email = Auth::user()->email;
        $this->validate($request, [
            'first_name'   => 'required|string',
            'last_name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'contact' => 'required|string',
            'address'=> 'required|string',
            'citizenship'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'certificate'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category'=> 'required|integer',
            'experience'=> 'required|integer',
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
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'image' => $profile_img,
                'contact' => $request->contact,
                'address' => $request->address,
                'citizenship' => $citizenship_img,
                'certificate' => $certificate_img,
                'category' => $request->category,
                'experience' => $request->experience,
                'submit_status' => 'submitted',
                ]);
                
        $users = DB::table('doctors')->where('email', $email)->first();
        return view('home')->with('data', $users);
    }
}
