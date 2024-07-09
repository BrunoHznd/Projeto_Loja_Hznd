<!DOCTYPE html>

<html lang="pt-br">
    
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição dos Produtos</title>

</head>

<body>



</body>


</html>

<?php 

// Pegando o Produto Selecionado Pelo Get 
if(isset($_GET['nome'])) {
$nome_prod = $_GET['nome'];

try {
    include "conexao.php";

    // fazendo a pesquisa se tem o produto no banco de dados
    $select = $conexao->prepare("SELECT * FROM produto WHERE nome_prod= :nome_prod ");
    $select->bindParam(':nome_prod', $nome_prod, PDO::PARAM_STR);
    $select->execute();

    if($select->rowCount() == 1) {
        if($produto = $select->fetch()) {

            ?>

            <h1>Editar Produto</h1>

            <form action="#" method="post" enctype="multipart/form-data">
                Novo Nome: <input type="text" name="nvNome"> <br><br>
                Novo Preço: <input type="number" name="nvPreco"> <br><br>
                <strong> Produto Destaque </strong> <br><br> 
                SIM<input type="radio" name="nvDestaque" value="Sim"> <br><br>
                NÂO<input type="radio" name="nvDestaque" value="Nao"> <br><br>

                Nova Foto Do Produto: <input type="file" name="nvFoto"> <br><br>

                <input type="submit" value="Atualizar">
            </form>
            <?php
        }

    }else {
        echo "Produto não encontrado";
    }
}catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

} else { 
    echo "Nenhum Produto selecionado";
}

//gabiarra pq não né (Pegando os dados do formulario para fazer o update no banco de dados)

if($_POST) {
    $novoNomeProd = $_POST["nvNome"];
    $novoPrecoProd = $_POST["nvPreco"];
    $novoDestaqueProd = isset($_POST['nvDestaque']) ? $_POST['nvDestaque'] : null;
    $novaFotoProd = $_FILES['nvFoto']['name'];
    

    //AAAAAAAAAAAAAAAAAAAAh Mover a nova foto para o Diretorio...

    $diretorio = "uploads/";
    $caminho = $diretorio . basename($novaFotoProd);
     if(move_uploaded_file($_FILES['nvFoto']['tmp_name'], $caminho)) {
       if(!empty($novoNomeProd) && !empty($novoPrecoProd) && !empty($novaFotoProd) && !empty($novoDestaqueProd)) {

         try {
           $sql = "UPDATE produto SET nome_prod='$novoNomeProd', preco_prod='$novoPrecoProd', foto_prod='$caminho', destaque_prod='$novoDestaqueProd'";

           $conexao->exec($sql);
                echo "<script>alert('Produto Recadastrado Com total Sucesso')</script>";
    

         }catch (PDOException $e) {
           echo "Erro: " . $sql . "<br>" . $e->getMessage();
         }

// Não esquecer de criar o banco de dados primeiro...
     }else {
       echo "Por favor, Preencha todos os Campos: ";
     }

     } else {
       echo "Erro ao fazer upload da imagem:";
     }

    
}

?>