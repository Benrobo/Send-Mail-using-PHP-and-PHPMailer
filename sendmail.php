<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";


if(isset($_POST['submit'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $msg = htmlspecialchars($_POST['msg']);

    $error = "";
    $pass = "";
    // check if fields are empty

    if(empty($name) || empty($email) || empty($msg)){
        $error .= str_replace(" ", "-", "Fields cannot be empty");
        header("location: index.php?err=$error");
        die;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error .= str_replace(" ", "-", "Email given is invalid");
        header("location: index.php?err=$error");
        die;
    }
    else {
        // if no error occur send mail
        $to = "reciepient@gmail.com";
        $mail = new PHPMailer(true); 
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 1;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "your-email@gmail.com";
        $mail->Password   = "xxxxxxxxx";
        $mail->From = $email;
        $mail->FromName = $name;
        $mail->addAddress($to);
        $mail->Subject = "Contact Form Request";
        $mail->Body = $msg;
        if($mail->send()){
            $pass .= str_replace(" ", "-", "Message sent Successfully!!");
            header("location: index.php?pass=$pass");
            die;
        }else{
            $error .= str_replace(" ", "-", "An error occur while sending message, please try later ".$mail->ErrorInfo);
            header("location: index.php?err=$error");
            die;
        }
    }
}
else{
    header("location: index.php");
    die;
}

?>
