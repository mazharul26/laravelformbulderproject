<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerController extends Controller {

    // =============== [ Email ] ===================
    public function email() {
        ini_set( 'display_errors', 1 );
        //error_reporting( E_ALL );
        $from = "md.mazharuli30@gmail.com";
        $to = "md.mazharuli30@gmail.com";
        $subject = 'I am Azam Khan';
        $message = "ok";
        $headers = "From:" . $from;
        if(mail($to,$subject,$message, $headers)) {
        echo "The email message was sent.";
        } else {
        echo "The email message was not sent.";
        }
    }


    // ========== [ Compose Email ] ================
    public function composeEmail(Request $request) {

    }
}
