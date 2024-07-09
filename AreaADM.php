<!DOCTYPE html>

<html lang="pt-br">
    
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link href="Imagem.png" rel="icon"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>

    a{
      text-decoration: none;
    }

    button{
      text-align: center;
      border: 2px;
      width: 200px;
      height: 65px;
      margin: 5px;
    }

    div {
      display: flex;
  justify-content: center;
  align-items: center;
    }

    </style>
    
</head>

<body>

<script>

// email Administrador: admin@email.com Senha: Admin123

  //  var email = prompt('Informe o Email De Administrador');

  //  if(email == 'admin@email.com') {
  //    var senha = window.prompt('Informe a Senha de Administrador');
  //    if(senha == 'Admin123') {
  //      window.alert('Logado com Sucesso na area do Administrador');
  //    }else {
  //      window.alert('Senha Incorreta');
  //      window.location.href = "http://localhost/HzndShop/index.php";
  //    }
    
  //  }else {
  //    window.alert('Email Incorreto');
  //    window.location.href = "http://localhost/HzndShop/index.php";
  //  }

  //  </script>

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
          <a class="nav-link" href="cad_log.php">Cadastrar/Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="carrinho.php">Carrinho</a><br>
        </li>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Procurar" aria-label="Procurar">
        <button class="btn btn-outline-success" type="submit">Procurar</button>
      </form>
    </div>
  </div>
</nav>

<br><br>

<h2>Area Do Administrador</h2> <br><br><br>

<div>

<button type="button" class="btn btn-outline-success" onclick="window.location.href='AddProduto.php' ">Adicionar Produtos</button><br><br>

<button type="button" class="btn btn-outline-primary" onclick="window.location.href='InfoProduto.php' ">Mudar Informações Dos Produtos</button> <br><br>

<button type="button" class="btn btn-outline-danger" onclick="window.location.href='InfoProduto.php'">Deletar Produtos</button> <br><br>

</div>

</body>


</html>