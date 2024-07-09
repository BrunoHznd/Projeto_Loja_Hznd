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
    //gabiarra (Fazer o javascript funcionar antes do PHP)
    window.location.href = "http://localhost/HzndShop/deletarProduto.php";
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


