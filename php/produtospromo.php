<?php

    include "conexao.php";

    $resultado = mysqli_query($con, "SELECT * FROM promocao WHERE promo > 0");

    $i = 0;

    while($registro = mysqli_fetch_assoc($resultado)){

        $dados[$i]["id_promo"] = $registro["id_promo"];
        $dados[$i]["nome"] = $registro["nome"];
        $dados[$i]["descricao"] = $registro["descricao"];
        $dados[$i]["preco"] = $registro["preco"];
        $dados[$i]["promo"] = $registro["promo"];

        $i++;

    };

    $objetoJSON = json_encode($dados);
    echo $objetoJSON;


?>