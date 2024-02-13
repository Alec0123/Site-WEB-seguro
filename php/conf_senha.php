<?php

$codigo = $_POST["codigo"];
$senha = $_POST["senha_cript"];

$mysqli = new mysqli("localhost:3306", "root", "", "steam_clone");


$sql = "SELECT * FROM usuario where Codigo_email = '$codigo'";
$select = mysqli_query($mysqli,$sql);
$array = mysqli_fetch_array($select);

if($array != null){
    $query = "UPDATE usuario SET senha = '$senha' WHERE Codigo_email = '$codigo'";
    $insert = mysqli_query($mysqli, $query);
    $retorno["status"] = "sucesso";
    echo json_encode($retorno);
}