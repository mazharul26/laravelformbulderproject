<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
class SmsController extends Controller
{
    public function index()
    {
        $number = '01515607893';
        $welcome = 'welcome%20to%20amar%20online%20school.';
        $class = "Class:%20".rawurlencode(9).',';
        $password = "Your%20Password:".'12345678';
        $name = "Name:".rawurlencode("md.Mazharul Islam").',';
        $message = "$welcome%20$name%20$class%20$password";
        $url ="http://smpp.ajuratech.com:7788/sendtext?apikey=6b2d714a6d7562d2&secretkey=ea70d8c1&callerID=SENDER_ID&toUser=88$number&messageContent=$message";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $output = curl_exec($curl);
        curl_close($curl);
         dd('Student created successfully!');
        // return redirect()->to('student/manage');


        // try {

        //     $client = app('Nexmo\Client');

        //     $receiverNumber = 15607893;
        //     $message = "This is testing from MMIT SOFT LTD.";

        //     $message = $client->message()->send([
        //         'toUser' => $receiverNumber,
        //         'from' => 'MD.Mazharul Islam',
        //         'messageContent' => $message
        //     ]);

        //     dd('SMS Sent Successfully.');

        // } catch (Exception $e) {
        //     dd("Error: ". $e->getMessage());
        // }
    }
}
