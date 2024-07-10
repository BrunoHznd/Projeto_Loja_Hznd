<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Produto</title>
</head>
<body>

</body>
</html>

<?php 

if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nome'])) {
    $valorReverter = $_GET['nome'];


try {
    include "conexao.php";

    $select = $conexao->prepare("DELETE FROM produto WHERE nome_prod= :nome_prod ");
    $select->bindParam(':nome_prod', $valorReverter, PDO::PARAM_STR);
    $select->execute();
    echo "Produto Deletado com sucesso";
    header('location: AreaADM.php');
    
}catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

} else {
    echo "Produto não foi deletado... Tentar novamente";
}


// fechando a conexao com o banco de dados
$conexao = null;

?>