<?php
    require_once "PHPMailer.php";
    require_once "SMTP.php";
    require_once "Exception.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendEmail($subject, $body, $address)
    {
        $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = '587';
            $mail->Username = 'studytale06@gmail.com';
            $mail->Password = 'ohdouwitqkbfgkfg';
            $mail->setFrom('studytale06@gmail.com');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->addAddress($address);

            // debug
            // $mail->SMTPDebug = 3;
            // $mail->send();
            // return $mail->ErrorInfo;

            if($mail->send())
            {
                echo "<script>alert('Email Telah Terkirim!!');</script>";
            }
            else
            {
                echo "<script>alert('Email Gagal Terkirim!!');</script>";
            }
    }
?>