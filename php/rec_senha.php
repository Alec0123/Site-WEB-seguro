
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    $email = $_POST["login"];
    $codigo = random_bytes(16);
    $codigo_email = bin2hex($codigo);

    $mysqli = new mysqli("localhost:3306", "root", "", "steam_clone");
    $sql = "SELECT * FROM usuario where email = '$email'";
    $select = mysqli_query($mysqli,$sql);
    $array = mysqli_fetch_array($select);

    if($array != null)
    {
      $nome = $array['nome'];
      $query = "UPDATE usuario SET Codigo_email = '$codigo_email' WHERE email = '$email'";
      $insert = mysqli_query($mysqli, $query);
      $retorno["status"] = "sucesso";
      echo json_encode($retorno);

      $mail = new PHPMailer();
    
        // Configuração
        $mail->Mailer = "smtp";
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
    
        // Detalhes do envio de E-mail
        $mail->Username = 'enzoceron.br@gmail.com'; // email do remetente
        $mail->Password = "amhiogzowrtbvadf"; // senha do email
        $mail->SetFrom($mail->Username, 'Suporte | Steam_clone'); // remetente
        $mail->addAddress($email); // destinatário
        $mail->Subject = "Mudanca de senha"; // assunto
    

    
    
        // Mensagem
        $mensagem = "<h1> Token para Mudacnca de senha </h1>
        <p> Olá, $nome</p>
        <p> Para confirmar seu email, digite esse código no campo que requisita o token </p>
        <h3> token: $codigo_email </h3>
        ";
        // $mensagem = "<h3> token: $token </h3>";
    
    
        $mail->msgHTML($mensagem);
        $mail->send();
    
    if ($mail->send()) {
        $mensagem =  "E-mail enviado com sucesso!";
        return $mensagem;
    } else {
        $mensagem =  "Erro ao enviar o e-mail: " . $mail->ErrorInfo;
        return $mensagem;
    }
    }
    else{
      $retorno["status"] = "falha";
      echo json_encode($retorno);
    }

?>