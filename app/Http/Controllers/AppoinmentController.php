<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
use App\Http\Requests\StoreAppoinmentRequest;
use App\Http\Requests\UpdateAppoinmentRequest;

class AppoinmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function bookAppoinment()
    {
        return view('bookAppointment');
    }

    public function myappoinment()
    {
        # code...
        return view('myappoinment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppoinmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppoinmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appoinment  $appoinment
     * @return \Illuminate\Http\Response
     */
    public function show(Appoinment $appoinment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appoinment  $appoinment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appoinment $appoinment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppoinmentRequest  $request
     * @param  \App\Models\Appoinment  $appoinment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppoinmentRequest $request, Appoinment $appoinment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appoinment  $appoinment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appoinment $appoinment)
    {
        //
    }
}