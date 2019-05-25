<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Auth;

class ConfirmController extends Controller
{
    //
    public function confirm(Request $request, $email) {
        $time = $request->date." ".$request->time;
        
        App\Relation::where('doctor_email', Auth::user()->email)
            ->where('patient_email', $email)
            ->update([
                'time' => $time,
                'app_status' => 'approved'
            ]);

        $profile = App\Patient::where('email', $email)->first();
        return view('layouts.next_page.profile', compact('profile')); 
    }
}
