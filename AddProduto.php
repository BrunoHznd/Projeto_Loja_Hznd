<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produtos</title>
    <link href="Imagem.png" rel="icon"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>

<!-- Imagem no NavBar -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <nav class="navbar navbar-light bg-light">

      <!-- NavBar Do bootstrap -->

  <a class="navbar-brand" href="index.php">
    <img src="Imagem.png" width="45" height="45">
  </a>
</nav>
    <a class="navbar-brand" href="index.php">Loja Hznd</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AreadADM.php">Cadastrar/Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="carrinho.php">Carrinho</a>
        </li>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Procurar" aria-label="Procurar">
        <button class="btn btn-outline-success" type="submit">Procurar</button>
      </form>
    </div>
  </div>
</nav><br><br>

<form action="#" method="post" enctype="multipart/form-data">

Insira o nome do produto: <input type="text" name="nm_prod" required placeholder="nome"> <br><br>
Insira o preço do produto: <input type="number" name="preco_prod" required placeholder="preço"> <br><br>


<h4>Colocar Produto Como Destaque?</h4> <br>

<input type="radio" id="sim" name="dest_prod" value="sim"> SIM <br><br>
<input type="radio" id="nao" name="dest_prod" value="nao"> NÃO <br><br>

Foto Do Produto: <input type="file" name="ft_produto" placeholder="Foto" require> <br><br>

<input type="submit" name="submit" required> <br><br>

</form>

</body>

</html>


<?php

require "conexao.php";

// Versão Mista com o Chat-GPT

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//   $nomeProduto = isset($_POST["nm_prod"]) ? $_POST["nm_prod"] : '';
//   $precoProduto = isset($_POST["preco_prod"]) ? $_POST["preco_prod"] : '';
//   $fotoProduto = isset($_FILES['ft_produto']['name']) ? $_FILES['ft_produto']['name'] : '';

//   // declaração do radio
//   $opcaoRadio = isset($_POST['dest_prod']) ? $_POST['dest_prod'] : '';

//   if (!empty($nomeProduto) && !empty($precoProduto) && !empty($fotoProduto) && !empty($opcaoRadio)) {
//       // movendo a Foto para o Diretorio uploads para ser exibido depois...
//       $diretorio = "uploads/";
//       $caminho = $diretorio . basename($fotoProduto);

//       if (move_uploaded_file($_FILES['ft_produto']['tmp_name'], $caminho)) {
//           try {
//               // Supondo que a conexão com o banco de dados esteja estabelecida na variável $conexao
//               $conexao = new PDO("mysql:host=localhost;dbname=sua_base_de_dados", "seu_usuario", "sua_senha");
//               $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//               $sql = "INSERT INTO produto (nome_prod, preco_prod, foto_prod, dest_prod) VALUES (?, ?, ?, ?)";
//               $stmt = $conexao->prepare($sql);
//               $stmt->execute([$nomeProduto, $precoProduto, $caminho, $opcaoRadio]);

//               echo "Produto Cadastrado Com sucesso";
//           } catch (PDOException $e) {
//               echo "Erro: " . "<br>" . $e->getMessage();
//           }
//       } else {
//           echo "Erro ao fazer upload da imagem.";
//       }
//   } else {
//       echo "Por favor, preencha todos os campos.";
//   }
// }



// Erro Versão Bruno

 if($_SERVER['REQUEST_METHOD'] == 'POST') {

     $nomeProduto = $_POST['nm_prod'];
     $precoProduto = $_POST['preco_prod'];
     $fotoProduto = $_FILES['ft_produto']['name'];

     // declaração do radio 
     $opcaoRadio = isset($_POST['dest_prod']) ? $_POST['dest_prod'] : null;
   


     // movendo a Foto para o Diretorio/pasta uploads...
     $diretorio = "uploads/";
     $caminho = $diretorio . basename($fotoProduto);
     if(move_uploaded_file($_FILES['ft_produto']['tmp_name'], $caminho)) {
       if(!empty($nomeProduto) && !empty($precoProduto) && !empty($fotoProduto) && !empty($opcaoRadio)) {

         try {
           $sql = "INSERT INTO produto (nome_prod, preco_prod, foto_prod, destaque_prod) VALUES (?, ?, ?, ?)";
           $stmt = $conexao->prepare($sql);
           $stmt->execute([$nomeProduto, $precoProduto, $caminho, $opcaoRadio]);

           echo "Produto Cadastrado Com Sucesso";
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