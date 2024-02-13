<?php

    session_start();

    $senha = $_POST["confirmacao_email"];
    
    $mysqli = new mysqli("localhost:3306", "root", "", "steam_clone");

    $sql = "SELECT * FROM usuario where Codigo_email= '$senha'";
    $result = mysqli_query($mysqli, $sql);
    if( mysqli_num_rows($result) > 0 ){
        $sql2 = "UPDATE usuario SET Confirmacao_email = '1' WHERE Codigo_email = '$senha'";
        $update= mysqli_query($mysqli, $sql2);
        $retorno["status"] = "sucesso";

    }else{
        $retorno["status"] = "falha";
    };

    echo json_encode($retorno);

  
?>