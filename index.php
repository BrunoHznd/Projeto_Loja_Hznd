<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hznd Shop</title>
    <link href="Imagem.png" rel="icon"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <style>

    .promocao{
      width: 25%;
      height: 100%;
    }

    </style>

</head>

<body>

<!-- Imagem no NavBar -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <nav class="navbar navbar-light bg-light">

      <!-- NavBar Do bootstrap -->

  <a class="navbar-brand" href="#">
    <img src="Imagem.png" width="45" height="45">
  </a>
</nav>
    <a class="navbar-brand" href="#">Loja Hznd</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="login.php">Cadastrar/Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AreaADM.php">Area Do Administrador</a>
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
</nav>

    <br><br><br><br><br>
    <h4><a href="paginaPromocoes.php">Aproveite as melhores promoções do dia</a></h4>

    <a href="paginaPromocoes.php"><img src="1886.jpg" class="promocao"></a>

    <h1>Produto: </h1>

    <?php 
    
    include "conexao.php";

    //pegando os ultimos 10 produtos cadastrados no banco pelo id
    $sql = "SELECT * FROM produto order by id DESC LIMIT 10";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $arrayProdutos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($arrayProdutos as $produtos) {

      echo "<article class='card'> 
            <img class='card-img-top' src='{$produtos['foto_prod']} >
            <div class='card-body'>
              <h5 class='card-title'>{$produtos['nome_prod']}</h5>
              <h6 class='card-text'>{$produtos['preco_prod']}</h6>
              <a href='checkout.php?id={$produtos['id']}&nome={$produtos['nome_prod']}&preco={$produtos['preco_prod']}&foto={$produtos['foto_prod']}' class='button pico-button'>comprar</a>
              </div>
              </article>";
    }
    
    ?>
    

</body>

</html>