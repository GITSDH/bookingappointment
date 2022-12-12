<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Http\Requests\StoreHospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;



class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return Datatables::of(Hospital::query())->addIndexColumn()->make(true);
        }
        return view('hospitals.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('hospitals.create',compact('locations'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHospitalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHospitalRequest $request)
    {
        // return $subID = Auth::user()->portal->sub_number;
        // return $request;

        $hospital = new Hospital();
        $hospital->name = $request->name;
        $hospital->type = $request->type;
        $hospital->location_id = $request->location;
        $hospital->description = $request->description;
        $hospital->subscription_id = Auth::user()->portal->id;


        if ($request->file('logo')) {
            $thumbnail = $request->file('logo');
            $image_full_name = time().'_'.str_replace([" ", "."], ["_","a"],$hospital->name).'.'.$thumbnail->getClientOriginalExtension();
            $upload_path = 'images/hospitals/logos/';
            $image_url = $upload_path.$image_full_name;
            $success = $thumbnail->move($upload_path, $image_full_name);
            $hospital->logo = $image_url;
        }
        $hospital->save();

        return redirect()->route('hospitals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        $hospital = $hospital;
        $locations = Location::all();

        return view('hospitals.edit', compact('hospital','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHospitalRequest  $request
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHospitalRequest $request, Hospital $hospital)
    {
        $hospital->name = $request->name;
        $hospital->type = $request->type;
        $hospital->location_id = $request->location;
        $hospital->description = $request->description;


        if ($request->file('logo')) {
            if (\File::exists($hospital->logo)) {
                \File::delete($hospital->logo);
            }
            $thumbnail = $request->file('logo');
            $image_full_name = time().'_'.str_replace([" ", "."], ["_","a"],$hospital->name).'.'.$thumbnail->getClientOriginalExtension();
            $upload_path = 'images/hospitals/logos/';
            $image_url = $upload_path.$image_full_name;
            $success = $thumbnail->move($upload_path, $image_full_name);
            $hospital->logo = $image_url;
        }
        $hospital->update();


        return redirect()->route('hospitals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Hospital::find($id);
        if (\File::exists($hospital->logo)) {
            \File::delete($hospital->logo);
        }
        $hospital->delete();
        return response()->json(['status' => 'success', 'message' => 'Hospital deleted successfylly !']);
    }
}