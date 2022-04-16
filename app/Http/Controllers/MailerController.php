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
        $details = [
            'title' => "This is test Mail",
            'name' => "Md Mazharul Islam",
            'email' => "mazharul@gmail.com",
        ];
        \Mail::to('mazharul.islam@sarbs.net')
        ->cc('md.mazharuli30@gmail.com')
        ->bcc('md.mazharuli26@yahoo.com')
        ->send(new MyTestMail($details));
        dd("Sending Mail Successfully.");
    }



}
