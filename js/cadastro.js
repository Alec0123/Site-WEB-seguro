function salvar(){  
    //Hash da senha
    var senha = document.getElementById("senha").value;
      
    var senhaCriptografada = CryptoJS.SHA256(senha).toString()
    
    var input = document.getElementById("senhaHash")
    input.value = senhaCriptografada
  
    //Regex CPF
    const cpf = document.getElementById("cpf").value;
    const cpfre = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;
   
    //Regex email
    const email = document.getElementById("email").value;
    const emailre = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    //Contador para permitir o fetch depois de fazer as 3 validações
    contador = 0;
  
  
    //Validação do CPF
    if (cpfre.test(cpf)) {
      contador += 1;
    } else {
      alert("O valor do campo CPF não é valido");
      limpaCampos();
    }; 
  
    //Validação do email
    if (emailre.test(email)) {
      contador += 1;
    } else {
        alert("O valor do campo email não é valido");
        limpaCampos();
    }; 

    //Validação da Confirmação de senha
    if (document.getElementById("senha").value == document.getElementById("cosenha").value) {
        contador += 1;
    } else {
        alert("O valor do campo confirmação de senha não é valido");
        limpaCampos();
    };
  
    var form = document.getElementById("form");
    var dados = new FormData(form);
  
    if ( contador == 3 ){
      fetch("php/cadastro.php", {
        method: "POST",
        body: dados
    }).then(async function(retorno){
        var resposta = await retorno.json();
  
        if(resposta.status == "sucesso"){
           window.location.href = "confirmacao_email.html";
        }else{ 
            alert("Falha ao cadastrar!");
        }
    });
    }
  }
  
  function limpaCampos(){
    var nome = document.getElementById("nome");
    nome.value = null;
    var cpf = document.getElementById("cpf");
    cpf.value = null;
    var email = document.getElementById("email");
    email.value = null;
    var senha = document.getElementById("senha");
    senha.value = null;
    var cosenha = document.getElementById("cosenha");
    cosenha.value = null;
  
  }