<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App;


class AppointController extends Controller
{
    public function index($abc) 
    {
        $profile = App\Doctor::where('email', $abc)->first();
        if ($profile) {
            return view('layouts.next_page.profile', compact('profile'));            
        } else {    
            return "Page not found";
        }
    }

    public function index_patient($abc) 
    {
        $profile = App\Patient::where('email', $abc)->first();
        if ($profile) {
            return view('layouts.next_page.profile', compact('profile'));            
        } else {    
            return "Page not found";
        }
    }

    public function create(Request $request, $abc)
    {
        $this->validate($request, [
            'problems' => 'required|string',
            'problems_detail' => 'required|string',
            'report' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        if ($request->hasFile('report')) {
            $image = $request->file('report');
            $report_img = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/user/report/');
            $image->move($destinationPath, $report_img);
        } else {
            $report_img = '';
        }

        App\Relation::create([
            'problems' => $request->problems,
            'problems_detail' => $request->problems_detail,
            'report' => $report_img,
            'patient_email' => Auth::user()->email, 
            'doctor_email' => $abc,
        ]);
                
        $profile = App\Doctor::where('email', $abc)->first();
        if ($profile) {
            return view('layouts.next_page.profile', compact('profile'));
        } else {
            return 'Page not found';
        }
    }
}