function gravar() {

    fetch("php/gerar_chave.php", {
        method: "GET"
    })
    .then(function(response) {
        return response.text();
    }).then(function(pubKey) {

        var publicKeyPEM = pubKey.replace(/(-----(BEGIN|END) PUBLIC KEY-----|\n)/g, "");

        var form = new FormData(document.getElementById('form'));
        var data = {
            "login": document.getElementById("email").value,
            "senha": CryptoJS.SHA256(document.getElementById("senha").value).toString()
        };

        var chaveSimetrica = CryptoJS.lib.WordArray.random(16);
        var chaveSimetricaHex = CryptoJS.enc.Hex.stringify(chaveSimetrica);

        var dadosCriptografados = criptografarDados(data, chaveSimetrica);

        var encrypt = new JSEncrypt();
        encrypt.setPublicKey(publicKeyPEM);

        var chaveSimetricaCriptografada = encrypt.encrypt(chaveSimetricaHex);

        var ivHex = dadosCriptografados.iv;
        var chaveSimetricaCriptografadaHex = chaveSimetricaCriptografada.toString();

        var formCriptografado = new FormData();
        formCriptografado.append("iv", ivHex);
        formCriptografado.append("chave", chaveSimetricaCriptografadaHex);
        formCriptografado.append("dadosCriptografados", dadosCriptografados.mensagemCriptografada);

        fetch("php/login.php", {
            method: "POST",
            body: formCriptografado,
        }).then(async function(retorno){
            var resposta = await retorno.json();

            if(resposta.status == "sucesso")
                window.location.href = "inicial.html";
            else
                alert("Login ou Senha incorreta");

            limpaCampos();
        });
    })
}

function criptografarDados(data, chaveSimetrica) {

    var iv = CryptoJS.lib.WordArray.random(8);
    var ivRandom = CryptoJS.enc.Hex.stringify(iv).toString();

    var uiv = CryptoJS.enc.Utf8.parse(ivRandom);

    var valores = JSON.stringify(data);

    valores = CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse(valores));

    var criptografado = CryptoJS.AES.encrypt(valores, chaveSimetrica, {
        iv: uiv,
        mode: CryptoJS.mode.CBC,
        padding: CryptoJS.pad.ZeroPadding
    });

    var criptografadoString = criptografado.toString();

    var dadosCriptografados = {
        iv: ivRandom,
        mensagemCriptografada: criptografadoString
    };

    return dadosCriptografados;
}


function limpaCampos(){
    var login = document.getElementById("login"); 
    login.value = null;
    var senha = document.getElementById("senha");
    senha.value = null;
}

