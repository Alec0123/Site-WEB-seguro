<?php

    $iv = $_POST['iv'];
    $chaveCriptografada = $_POST['chave'];
    $dadosCriptografados = $_POST['dadosCriptografados'];

    $chavePrivada = file_get_contents('private_key.pem');

    openssl_private_decrypt(base64_decode($chaveCriptografada), $chaveSimetrica, $chavePrivada);

    $ivDecodificado = hex2bin($iv);

    $chaveSimetricaBinaria = hex2bin($chaveSimetrica);

    $dadosDescriptografados = openssl_decrypt(
        base64_decode($dadosCriptografados),
        "AES-128-CBC",
        $chaveSimetricaBinaria,
        OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING,
        $iv
    );

    $dadosDescriptografados = base64_decode($dadosDescriptografados);

    $dadosDecodificados = json_decode($dadosDescriptografados, true);

    $login = $dadosDecodificados['login'];

    $senha = $dadosDecodificados['senha'];
    
    $mysqli = new mysqli("localhost:3306", "root", "", "steam_clone");
    $sql = "SELECT * FROM usuario WHERE email = '$login' AND senha = '$senha'";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        $retorno["status"] = "sucesso";
        session_start();
        $_SESSION["email"] = $login;
    } else {
        $retorno["status"] = "falha";
    }
    echo json_encode($retorno);
?>