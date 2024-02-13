<?php

// Importa a biblioteca PHPMailer
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// Define as informações do servidor de email
$smtpHost = 'smtp.gmail.com';
$smtpPort = 587;
$smtpUsername = 'seu_email@gmail.com';
$smtpPassword = 'sua_senha';

// Define as informações do email
$fromEmail = 'seu_email@gmail.com';
$fromName = 'Seu Nome';
$toEmail = 'email_do_destinatario@provedor.com';
$subject = 'Alteração de senha';
$body = 'Clique no link abaixo para alterar sua senha:<br><a href="http://seusite.com/alterar_senha.php?token=1234567890">http://seusite.com/alterar_senha.php?token=1234567890</a>';

// Cria um objeto da classe PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Define as configurações de envio de email
$mail->isSMTP();
$mail->Host = $smtpHost;
$mail->Port = $smtpPort;
$mail->SMTPAuth = true;
$mail->Username = $smtpUsername;
$mail->Password = $smtpPassword;
$mail->SMTPSecure = 'tls';

// Define as informações do email
$mail->setFrom($fromEmail, $fromName);
$mail->addAddress($toEmail);
$mail->Subject = $subject;
$mail->Body = $body;
$mail->isHTML(true);

// Envia o email
if ($mail->send()) {
    echo 'Email enviado com sucesso!';
} else {
    echo 'Erro ao enviar email: ' . $mail->ErrorInfo;
}

?>
