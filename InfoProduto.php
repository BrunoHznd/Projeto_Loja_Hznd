<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações dos Produtos</title>

</head>

<body>

<h1>Altere Informações Dos Produtos Cadastrados Ou Delete O produto</h1>



</body>

</html>

<?php 

require "conexao.php";


$stmt = $conexao->prepare("SELECT * FROM produto");
$stmt->execute();

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($resultados) {
    foreach($resultados as $produto) {
        echo "Nome do Produto: " . $produto['nome_prod'] . "<br>";
        echo "Preço do Produto: " . $produto['preco_prod'] . "<br>";
        echo "Produto Destacado: " . $produto['destaque_prod']  . "<br>";
        echo "Foto do Produto: " .  $produto['foto_prod'] . "<br>";

        //botao para editar o Produto Que foi selecionado para edição...
        ?>
        <a href='updateProd.php?nome=<?php echo $produto['nome_prod']; ?>' >Editar Produto</a> <b> - | - </b>

        <!-- Mandando o valor da variavel junto... -->
        <a href='delProduto.php?nome=<?php echo urlencode($produto['nome_prod']); ?>' >Excluir Produto</a> <br><br><br>

        <?php
    }
}

$conexao = null;

?>