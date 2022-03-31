<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $ip =$_SERVER['REMOTE_ADDR'];  //Dynamic IP address */
        $ip = '23.29.122.202'; /* Static IP address */
        $currentUserInfo = Location::get($ip);

        return view('user', compact('currentUserInfo'));
    }
}
