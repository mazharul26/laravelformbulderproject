<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {

            if(Auth::user()->hasRole('user')){
                return"I am a user";
            }elseif(Auth::user()->hasRole('admin'))
            {
                return view("admin.layouts.adminhome");

            }elseif (Auth::user()->hasRole('super-admin')) {
                return view("admin.layouts.adminhome");
            }

    }
}
