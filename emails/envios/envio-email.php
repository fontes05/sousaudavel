<?php
$to       = 'fontes05@gmail.com';
$subject  = 'Testing sendmail.exe';
$message  = 'Hi, you just received an email using sendmail!';
$headers  = 'From: fontes05@gmail.com' . "\r\n" .
            'Reply-To: fontes05@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
if(mail($to, $subject, $message, $headers))
    echo "Email enviado";
else
    echo "Email sending failed";
?>