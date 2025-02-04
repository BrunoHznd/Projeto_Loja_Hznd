<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro/Login</title>
    <link href="Imagem.png" rel="icon"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <style>

    body {
      background-color: #d3d3d3;

    }

  a{
    color: red;
    text-decoration: none;
  }



  </style>

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
          <a class="nav-link" href="AreadADM.php">Area Do Administrador</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="carrinho.php">Carrinho</a>
        </li>
    </div>
  </div>
</nav>
    <br><br><br>


<form method="post" action="#">

Informe o seu Nome: <input type="text" name="nm_cad" required><br><br>
Informe o seu Email: <input type="email" name="email_cad" required> <br><br>
Informe a sua Senha: <input type="password" name="senha_cad" required> <br><br>
<input type="submit" values="Cadastrar"><br><br><br><br><br>

</form> <br><br>


<button type="button" class="btn btn-outline-dark"><a href="login.php">Ja tem Cadastro?</a></button>
<br><br>

<h1>Entrar com o facebook ou Google</h1>



</body>

</html>

<?php 

require "conexao.php";

if($_POST) {
    $nome = $_POST['nm_cad'];
    $email = $_POST['email_cad'];
    $senha = $_POST['senha_cad'];

    if(!empty($nome) && !empty($email) && !empty($senha)) {
        try {
            require "conexao.php";

            // Criptografando a senha do usuario

            $senhacrip = password_hash($senha, PASSWORD_DEFAULT);

            // Criando Usuario e inserindo no Banco A senha cadastrada esta sendo criptografada
            $sql_usuario = "INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario) VALUES ('$nome','$email','$senhacrip')";

            $conexao->exec($sql_usuario);
            header('location: index.php');
            exit;
        } catch (PDOException $e) {
            echo $sql_banco . "<br>" . $e->getMessage();
        }
    }
}

?>