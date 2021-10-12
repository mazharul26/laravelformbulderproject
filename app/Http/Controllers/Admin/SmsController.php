<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function index(){


        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
        'to' => '+8801515607893',
        'from' => 'Laravel',
        'text' => 'Text message Sent From  To confrim that this is your Phone Number.'
        ]);
    }
}
