<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Auth;

class ConfirmController extends Controller
{
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

    public function rating(Request $request, $email, $act) {
        $doc_rating =  App\Doctor::where('email', $email)->first();
        $rating = $doc_rating->rating;
        if ($act === 'increase') {
            $new_rating = ++$rating;
        }
        if ($act === 'decrease' && $rating > 0) {
            $new_rating = --$rating;
        }
        else {
            $new_rating = $rating;
        }
        App\Doctor::where('email', $email)
            ->update([
                'rating' => $new_rating,
            ]);
        return redirect()->to('profile/doctor/'.$email);
    }

    public function complete(Request $request, $pat, $doc) {
        App\Relation::where('doctor_email', $doc)
            ->where('patient_email', $pat)
            ->where('status', 'pending')
            ->update([
                'status' => 'completed',
            ]);
        return redirect()->to('home');        
    }
}
