fetch("php/produtospromo.php", {
    method: "GET"
}).then(async function (dados) {

    var objeto = await dados.json();

    listarProdutos(objeto);

});

function listarProdutos(produto){

    for(var i = 0; i < produto.length; i++){

        var conteudo = '';
        conteudo += '<div class="card">';
        conteudo += '<div class="img_prod">';
        conteudo += '<img id="id" src="img/' + produto[i].id_promo+ '.jpg" />';
        conteudo += '</div>';
        conteudo += '<div class="nome">' + produto[i].nome + '</div>';
        conteudo += '<div class="descricao">' + produto[i].descricao + '</div>';
        conteudo += '<div class="valor">De: R$' + produto[i].preco + ',00<br>Por: R$' + produto[i].promo + ',00</div> <br>';
        conteudo += '<button class="compra" onclick="comprar(' + produto[i].id_promo + ')">Comprar </button>';
        conteudo += '</div>';

        document.getElementById("produto").innerHTML += conteudo;
    }

};


function comprar(id){
 
    document.getElementById("id").value = id;
    var form = document.getElementById("formProduto");
    var dados = new FormData(form);

    fetch("php/addcarrinho.php", {
        method: "POST",
        body: dados
    }).then(async function(retorno){
        var resposta = retorno.json();

        if(resposta.status == "sucesso"){
            alert("Produto adicionado ao carrinho com sucesso!");
        }
        else{
            alert("Erro ao adicionar o produto ao carrinho, tente novamente.");
        }
    });

};
