<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Http\Requests\StoreSlotRequest;
use App\Http\Requests\UpdateSlotRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(Slot::where('subscription_id',Auth::user()->portal->id))->addIndexColumn()->make(true);
        }
        return view('slots.index');
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
     * @param  \App\Http\Requests\StoreSlotRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlotRequest $request)
    {
        //
        $slot = Slot::create([
            'name'=> $request->name,
            'start'=> $request->start,
            'end'=> $request->end,
            'subscription_id'=> Auth::user()->portal->id,
        ]);

        return redirect()->route('slots.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function show(Slot $slot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function edit(Slot $slot)
    {
        $slot = $slot;
        return view('slots.edit',compact('slot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSlotRequest  $request
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlotRequest $request, Slot $slot)
    {

        //
        $slot = $slot;
        $slot->name = $request->name;
        $slot->start = $request->start;
        $slot->end = $request->end;
        $slot->save();
        return redirect()->route('slots.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Slot::find($id);
        $user->delete();
        return response()->json(['status' => 'success', 'message' => 'Slot deleted successfylly !']);
    }
}