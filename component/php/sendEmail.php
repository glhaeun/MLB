<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../phpmailer/vendor/autoload.php';
    function sendEmail($email, $reset_token) {
    
    
        require('../phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php');
        require('../phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php');
        require('../phpmailer/vendor/phpmailer/phpmailer/src/Exception.php');

        $message_body = "We got a request from you to reset your password! <br>
        Click the link below: <br>
        <a href='http://localhost/tester/user/update_password.php?email=$email&reset_token=$reset_token'>Reset Password</a>";
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = TRUE;
            $mail->SMTPSecure = 'tls'; // tls or ssl
            $mail->Port     = "2525";
            $mail->Username = 'smtp_username';   //email
            $mail->Password = 'smtp_password' ; 
            $mail->Host     = "mail.smtp2go.com";
            $mail->Mailer   = "smtp";
            $mail->AddReplyTo('ejscassava@gmail.com','MLB');
            $mail->SetFrom('ejscassava@gmail.com','MLB');
            $mail->AddAddress($email);
            $mail->Subject = "Password Reset Link from MLB";
            $mail->MsgHTML($message_body);
            $mail->IsHTML(true);		
            $result = $mail->Send();
    
            if(!$result) 
            {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } 
        
    }

    
?>