function sair(){

        fetch("php/sair.php", {
            method: "GET",
        }).then(async function (retorno) {
            var resposta = await retorno.json();

            if (resposta.status == "sucesso") {
                window.location.href = "index.html";
            } else {
                alert("erro");
            }
        });
}