<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Login Hznd Shope</title>
    <link href="Imagem.png" rel="icon"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>

a{
    text-decoration: none;
    color: #808080;
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
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Procurar" aria-label="Procurar">
        <button class="btn btn-outline-success" type="submit">Procurar</button>
      </form>
    </div>
  </div>
</nav>
<br><br>

<h1>Faça o Seu Login na Hznd Shope</h1> <br><br>

<form method="post" action="#">

Digite o Seu Email: <input type="email" name="email_Login" placeholder="Digite o Seu email:" required> <br><br>
Digite a Sua Senha: <input type="password" name="senha_Login" placeholder="Digite a sua Senha" required> <br><br>

<input type="submit" name="Enviar">

</form>

<br><br><br>

<button type="button" class="btn btn-outline-secondary"><a href="cad_log.php">Não tem Cadastro? Clique em Mim</a></button>
    
</body>

</html>


<?php 

$error = '';

require "conexao.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailVerificar = $_POST['email_Login'];
    $senhaVerificar = $_POST['senha_Login'];

    if(!empty($emailVerificar) && !empty($senhaVerificar)) {
        try {

            require "conexao.php";
            
            $sql = "SELECT * FROM usuario WHERE email_usuario=:email";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam('email', $emailVerificar);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if($usuario) {
                if (password_verify($senhaVerificar, $usuario['senha_usuario'])) {
                    $_SESSION['email'] = $emailVerificar;
                    header('location: index.php');
                    exit;
                } else {
                    $error = "Erro: Email ou senha Incorreto";
                }

            }else {
                $error = "Erro: Email Não Cadastrado";
            }

        }catch (PDOException $e) {
            $error = "Erro Ocorreu um Problema";
        }

    } else {
        $error = "Por Favor, Preencha todos os campos";
    }

}

?>