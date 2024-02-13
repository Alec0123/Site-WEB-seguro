fetch("php/conf_session.php", {
        method: "GET",
}).then(async function (retorno) {
        var resposta = await retorno.json()
        if (resposta.status == "falha") {
            window.location.href = "index.html";
        } 
});
