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
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp',
            'email' => 'md.mazharuli30@gmail.com',
        ];
        \Mail::to("md.mazharuli30@gmail.com", "Green life")->send(new MyTestMail($data));

        // \Mail::send('emails/myTestMail', $data, function($message) use ($data) {
        //     $message->to('admin@admin.com')->subject('User Info');
        //     $message->from($data['email']);
        // });


        dd("Email is Sent.");
    }



}
