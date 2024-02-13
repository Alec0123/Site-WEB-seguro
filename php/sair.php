<?php

include_once 'conexao.php';

if(isset($_SESSION['email'])){
    session_destroy();
    $retorno["status"] = "sucesso"; 
} else{
    $retorno["status"] = "erro";
}
    echo json_encode($retorno);
?>