<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerController extends Controller {

    // =============== [ Email ] ===================
    public function email() {
        return view("email");
    }


    // ========== [ Compose Email ] ================
    public function composeEmail($sender_address,$otp) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        if (true) {
//            require_once LIBRARY_FOLDER . "phpmailer/class.phpmailer.php";


//            require_once LIBRARY_FOLDER . 'PHPMailer/src/Exception.php';
//            require_once LIBRARY_FOLDER . 'PHPMailer/src/PHPMailer.php';
//            require_once LIBRARY_FOLDER . 'PHPMailer/src/SMTP.php';
//            $mail = new PHPMailer;
            $mail->IsSMTP(); // telling the class to use SMTP


            $mail->Host = 'mail.sportsmatik.com';       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;               // Enable SMTP authentication
            $mail->Username = 'noreply@sportsmatik.com';   // SMTP username
            $mail->Password = '#S#port732';   // SMTP password
            $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                    // TCP port to connect to

// Sender info
            $mail->setFrom('happyhassen0786@gmail.com', 'SportsMatik');
            $mail->addReplyTo($sender_address, 'SportsMatik');

// Add a recipient
            $mail->addAddress($sender_address);

//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

// Set email format to HTML
            $mail->isHTML(true);

// Mail subject
            $mail->Subject = 'Testing';

//            foreach ($data["to"] as $key => $tosend) {
//                $mail->AddAddress($key, $tosend);
//            }

//            if (count($data["cc"]) > 0) {
//                foreach ($data["cc"] as $key => $tosend) {
//                    $mail->AddBCC($key, $tosend);
//                }
//            }
//            if (count($data["attachment"]) > 0) {
//                foreach ($data["attachment"] as $path) {
//                    $mail->addAttachment($path);
//                }
//            }
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Testing';
            $mail->MsgHTML('Hii...<br> Your OTP '.$otp);


            //send the message, check for errors
            try {
                if(!$mail->send()) {
                    return false;
                } else {
                  return true;
                }
//            $mail->ErrorInfo;
            } catch (Exception $ex) {
                echo $ex->getMessage();
//                $retval = false;
//                Session::setAlert(array("emsg" => $ex->getMessage(), "etype" => STATE_ERR_ERROR));
            }
//            return $retval;
        }
    }
}
