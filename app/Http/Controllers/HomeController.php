<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            return view('dashboard');
        }
        if (Auth::user()->hasRole('superadmin')) {
            return view('dashboard');
        }
        if (Auth::user()->hasRole('employee')) {
            return view('dashboard');
        }
        if (Auth::user()->hasRole('doctor')) {
            return view('dashboard');
        }

        return view('index');
    }

    public function dashboard()
    {
        if (Auth::user()->hasRole('user')) {
            return view('index');
        }
        return view('dashboard');
    }
}