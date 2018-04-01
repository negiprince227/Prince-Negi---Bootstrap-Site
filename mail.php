<?php
if (isset($_POST['btn'])) {
    $user = $_POST['user_name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    
    require 'PHPMailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
       // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
       // $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'shaluraj227@gmail.com';                 // SMTP username
        $mail->Password = '9882166220';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($email, $user);
        $mail->addAddress( 'shaluraj227@gmail.com', 'Shalu Raj' );     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
       // $mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');

        //Attachments
       // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
       // $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = "$msg";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}