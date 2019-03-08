<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$result = "";

if(isset($_POST['sendmail'])) {
    
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    

    try {
        //Server settings
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'bijendrakarmakar999@gmail.com';                 // SMTP username
        $mail->Password = '9612498689';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($_POST['email'], $_POST['name']);
        $mail->addAddress('bijendrakarmakar09@gmail.com', 'Bijendra');     // Add a recipient
                  
    

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $_POST['subject'];
        
        $mail->Body    = '<h1 align=center>Name :'.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Message: '.$_POST['message'].'</h1>';
        
        $mail->AltBody = $_POST['phone'];

    
        $mail->send();
        $result = 'Thank you, ' . $_POST['name'] . ' your message has been send successfully';
    } catch (Exception $e) {
        $result = 'Something went wrong please try again. Mailer Error: ' . $mail->ErrorInfo;
}

}

?>


<!DOCTYPE html>
<html>
	
	<head>
	
	<link rel="stylesheet" href="css/contact.css">
	<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">		
		
	</head>
	
	<body onLoad="setTimeout('delayedRedirect()', 3500)">
		
		<h1><?= $result; ?></h1>
		
	</body>
	
</html>


<script type="text/javascript">
    function delayedRedirect() {
        window.location = "index.html";
    }

</script>

