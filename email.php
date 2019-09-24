<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
    use PHPMailer\PHPMailer\PHPMailer;
    if(isset($_POST['forgt'])){
        $email = $_POST['email'];
        $name = $_POST['name'];
        $message = $_POST['comment'];
        require 'vendor/autoload.php';
        require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require 'vendor/phpmailer/phpmailer/src/Exception.php';
        // Instantiation and passing `true` enables exceptions
        
        //if($email==$emailData){
        $mail = new PHPMailer();

                $mail->isSMTP(true);                                      // Set mailer to use SMTP
                $mail->SMTPDebug=0;
                $mail->SMTPAuth =true;
                $mail->SMTPSecure='ssl';
                $mail->Host='smtp.gmail.com';
                $mail->Port=465;
                $mail->isHTML(true);                                 // Set email format to HTML
                $mail->Username='solomaboya@gmail.com';
                $mail->Password='nthabisen';
                $address='solomaboya@gmail.com';                     // TCP port to connect to
                $mail->setFrom($email);
                $mail->addReplyTo($email, 'Information');

                $mail->Subject = 'Website builder or designer client :';
                $mail->Body    = $name."<br>".$message;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->addAddress($address); 
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    $msg='<div class="alert alert-success">Message has been sent</div>';
                }  
    }
    
    ?>
    <br><br>

<div class="container">
    <?php
        if (isset($msg)){
            echo $msg;
        }
    ?>
    <?php
        if (isset($errMsg)){
            echo $errMsg;
        }
    ?>
</div>
    </body>
</html>
