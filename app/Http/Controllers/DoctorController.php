<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Slot;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return Datatables::of(
                User::role('doctor')->get()
                )->addIndexColumn()->make(true);
        }
        return view('doctors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialities = Speciality::all();
        $hospitals= Hospital::where('subscription_id',Auth::user()->portal->id)->get();
        $slots = Slot::where('subscription_id',Auth::user()->portal->id)->get();
        return view('doctors.create',compact('specialities','hospitals','slots'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $doctor = new Doctor;
        $doctor->user_id  = $user->id;
        $doctor->speciality_id   = $request->speciality;
        $doctor->hospital_id   = $request->hospital;
        $doctor->slot_id   = $request->slot_id;
        $doctor->nationality  = $request->nationality;
        $doctor->gender  = $request->gender;
        $doctor->language  = $request->language;
        $doctor->subscription_id  = Auth::user()->portal->id;
        if ($request->file('photo')) {
            $thumbnail = $request->file('photo');
            $image_full_name = time().'_'.str_replace([" ", "."], ["_","a"],$user->name).'.'.$thumbnail->getClientOriginalExtension();
            $upload_path = 'images/doctor/photo/';
            $image_url = $upload_path.$image_full_name;
            $success = $thumbnail->move($upload_path, $image_full_name);
            $doctor->photo = $image_url;
        }
        $doctor->save();


        $role = Role::where('name','doctor')->first();
        $user->assignRole([$role->id]);

        return redirect()->route('doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('doctors.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->with('docprofile')->first();
        $specialities = Speciality::all();
        $hospitals= Hospital::where('subscription_id',Auth::user()->portal->id)->get();
        $slots = Slot::where('subscription_id',Auth::user()->portal->id)->get();
        return view('doctors.edit',compact('user','specialities','hospitals','slots'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->update();

        $doctor = Doctor::where('user_id',$id)->first();
        $doctor->nationality  = $request->nationality;
        $doctor->gender  = $request->gender;
        $doctor->language  = $request->language;
        $doctor->speciality_id   = $request->speciality;
        $doctor->hospital_id   = $request->hospital;
        $doctor->slot_id   = $request->slot_id;

        if ($request->file('photo')) {
            if (\File::exists($doctor->photo)) {
                \File::delete($doctor->photo);
            }
            $thumbnail = $request->file('photo');
            $image_full_name = time().'_'.str_replace([" ", "."], ["_","a"],$user->name).'.'.$thumbnail->getClientOriginalExtension();
            $upload_path = 'images/doctor/photo/';
            $image_url = $upload_path.$image_full_name;
            $success = $thumbnail->move($upload_path, $image_full_name);
            $doctor->photo = $image_url;
        }
        $doctor->save();

        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::where('user_id',$id)->first();
        $doctor->delete();
        $user = User::find($id);
        $user->delete();
        return response()->json(['status' => 'success', 'message' => 'Doctor deleted successfylly !']);
    }
}