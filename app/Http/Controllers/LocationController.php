<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;

class LocationController extends Controller
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
                Location::where('subscription_id',Auth::user()->portal->id)->get()
                )->addIndexColumn()->make(true);
        }

        return view('locations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationRequest $request)
    {
        $location = Location::create(['name'=>$request->name,'subscription_id'=>Auth::user()->portal->id]);
        return redirect()->route('locations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id;
        $location = Location::find($id);
        return view('locations.edit',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLocationRequest  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $location->name = $request->name;
        $location->update();
        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();
        return response()->json(['status' => 'success', 'message' => 'Location deleted successfylly !']);
    }
}