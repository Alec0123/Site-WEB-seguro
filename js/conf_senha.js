function trocar(){
    var senha = document.getElementById("senha").value;
    var cosenha = document.getElementById("cosenha").value;
      
    var senhaCriptografada = CryptoJS.SHA512(senha).toString()
    
    var input = document.getElementById("senha_cript")
    input.value = senhaCriptografada
  
    var form = new FormData(document.getElementById('form'));
        fetch("php/conf_senha.php", {
            method: "POST",
            body: form
        }).then(async function(retorno) {
            if (senha == cosenha)
            var resposta = await retorno.json();

            if (resposta.status == "sucesso")
                window.location.href = "index.html";
            else
                alert("Login incorreto");

            limpaCampos();
        });
}
