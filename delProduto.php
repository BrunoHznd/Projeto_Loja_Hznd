<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Produto</title>

</head>


<body>
    
<script>

var deletar = prompt("Você tem certeza que quer deletar esse Produto? | S para sim | N para não");
deletar = deletar.toUpperCase();

if(deletar == "S") {
    window.alert("Você Deletou o Produto");

    //passando o valor de PHP para Javascript (ChatGPT) e depois mandar para o arquivo php ;-;

   //Pegando o nome do produto da url
   const urlParams = new URLSearchParams(window.location.search);
   const nomeProduto = urlParams.get('nome');
    
    
    //Redirecionando com o nome do produto como parametro
    window.location.href = "http://localhost/HzndShop/deletarProduto.php?nome=" + encodeURIComponent(nomeProduto) ;

} else if (deletar === "N"){
    window.alert("Você não deletou o Produto");
    window.location.href = "http://localhost/HzndShop/AreaADM.php";
}else {
    window.alert("Resposta Invalida");
    window.location.href = "http://localhost/HzndShop/AreaADM.php";
}

</script>

</body>


</html>


