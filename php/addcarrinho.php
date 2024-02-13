<?php

  include "conexao.php";
  
  $id_produto = $_POST["id"];
  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];
  $valor = $_POST["valor"];   

  $sql = "INSERT INTO carrinho(id_produto, nome, descricao, valor) VALUES ('$id_produto', '$nome', '$descricao', '$valor')";
  $result = mysqli_query($con, $sql);

  if($result){
      $retorno["status"] = "sucesso";
    }else{
      $retorno["status"] = "falha";
  };  

?>