<?php

namespace App\Http\Controllers;

use App\Mail\MyTestMail;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerController extends Controller {

    // =============== [ Email ] ===================
    public function sendmail()
     {
        $data = [
            'title' => 'SARBS Communication LTD.',
            'body' => 'This is for testing email using smtp',
            'email' => 'mazharul@gmail.com',
        ];
        // \Mail::to("admin@gmail.com", "Great")->send(new MyTestMail($data));
        // dd("Email is Sent.");
           $emails = ['mazharul.islam@sarbs.net','md.mazharuli30@gmail.com'];

            \Mail::send('emails.myTestMail', $data, function($message) use ($emails)
            {
                $message->to($emails)->subject('Warehouse Inventory');
            });
            return('Email is Sent.');
            exit;
    }



}
