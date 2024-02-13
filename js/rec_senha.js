function gravar(){   
        var form = new FormData(document.getElementById('form'));
        fetch("php/rec_senha.php", {
            method: "POST",
            body: form
        }).then(async function (retorno) {
            var resposta = await retorno.json();

            if (resposta.status == "sucesso")
                window.location.href = "conf_senha.html";
            else
                alert("Login incorreto");

            limpaCampos();
        });
    }


function limpaCampos(){
    var login = document.getElementById("login");
    login.value = null;
}