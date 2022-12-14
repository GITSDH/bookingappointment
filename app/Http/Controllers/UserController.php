<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if ($request->ajax()) {
            if (Auth::user()->hasRole('admin')) {
                $sid =Auth::user()->portal->id;
                return Datatables::of(
                    User::whereHas('docprofile', function ($query) use($sid){
                        $query->where('subscription_id', $sid);
                    })->get()
                    )->addIndexColumn()->make(true);
            }
            if (Auth::user()->hasRole('superadmin')) {
                return Datatables::of(
                    User::whereHas('roles', function ($query){
                        $query->where('name', 'admin');
                    })->get()
                    )->addIndexColumn()->make(true);
            }
        }
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create',compact('roles'));
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
            'role' => ['required'],
        ]);


        $role = Role::find($request->role);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole([$role->id]);

        // Assigning subscription
        if ($request->role == 2) {
            $randomnum = 'BNA'.date('ymdHis');
            $subscription = Subscription::create(['sub_number' => $randomnum,'owner_id' => $user->id]);
        }

        // Ceating user subscription
        if (Auth::user()->hasRole('admin')) {
            $sub = Subscription::where('owner_id', Auth::user()->id)->first();
            $usersub = UserSubscription::create(['user_id' => $user->id, 'subscription_id' => $sub->id]);
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('users.edit',compact('user','roles'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required'],
        ]);

        $role = Role::find($request->role);
        $user = User::find($id);
        $user->name = $request->name;

        $otheruserwithemail = User::where('email',$request->email)->where('id','!=',$id)->first();
        if ($otheruserwithemail) {
            return redirect()->route('users.edit',$id)->withErrors('This email already in use.');
        }else {
            $user->email = $request->email;
        }
        $user->save();
        $user->assignRole([$role->id]);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['status' => 'success', 'message' => 'User deleted successfylly !']);
    }
}