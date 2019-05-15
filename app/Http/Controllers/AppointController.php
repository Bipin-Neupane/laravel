<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Relation;
use Auth;

class AppointController extends Controller
{

    public function index($abc) {
        $profile = DB::table('doctors')->where('email', $abc)->first();
        if ($profile) {
            return view('layouts.next_page.profile', compact('profile'))->with('success', 'Successfully sent');
        } else {
            return 'Page not found';
        }
    }

    public function create(Request $request, $abc)
    {
        $email = Auth::user()->email;
        $profile = DB::table('doctors')->where('email', $abc)->first();
        $patient = DB::table('patients')->where('email', $email)->first();

        $this->validate($request, [
            'problems' => 'required|string',
            'problems_detail' => 'required|string',
            'report' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        if ($request->hasFile('report')) {
            $image = $request->file('report');
            $report_img = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/user/report/');
            $image->move($destinationPath, $report_img);
        }

        Relation::create([
            'problems' => $request->problems,
            'problems_detail' => $request->problems_detail,
            'report' => $report_img,
            'patient_id' => $patient->id, 
            'doctor_id' => $profile->id,
        ]);
                
        // $users = DB::table('doctors')->where('email', $email)->first();
        // return view('home')->with('data', $users);

        if ($profile) {
            return view('layouts.next_page.profile', compact('profile'))->with('success', 'Successfully sent');
        } else {
            return 'Page not found';
        }
    }
}
