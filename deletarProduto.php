<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>a</title>
</head>
<body>

Produto Deletado
    
</body>
</html>

<?php 

if(isset($_GET['nome'])) {
$nome_prod = $_GET['nome'];


try {
    include "conexao.php";

    $sql = "DELETE FROM produto WHERE nome_prod='$nome_prod' ";

    $conexao->exec($sql);
    
}catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

}else {
    echo "Produto não foi deletado";
}

// fechando a conexao com o banco de dados
$conexao = null;

?>