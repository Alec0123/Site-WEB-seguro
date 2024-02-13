function gravar(){   
    
    var form = new FormData(document.getElementById('form'));
    fetch("php/confirmacao_email.php", {
        method: "POST",
        body: form
    }).then(async function(retorno){
        var resposta = await retorno.json();
        
        if(resposta.status == "sucesso")
            window.location.href = "index.html";
        else
            alert("codigo incorreto");
            
            limpaCampos();
    });
}

function limpaCampos(){
    var login = document.getElementById("login");
    login.value = null;
    var senha = document.getElementById("confirmacao_email");
    senha.value = null;
}
