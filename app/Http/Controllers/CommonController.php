<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommonController extends Controller
{

    public function getfacility(Request $request)
    {
        $hospitals = Hospital::where('subscription_id', Auth::user()->subscription->first()->id)->get();
        return response()->json(['status'=>'success','data'=>$hospitals]);
    }

    public function getDoctor(Request $request)
    {
        $doctors = User::with('docprofile')
        ->whereHas('docprofile', function($q) use ($request){
            $q->where('hospital_id', $request->hospital);
        })->get();
        return response()->json(['status'=>'success','data'=>$doctors]);
    }

}