<?php 

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conexao = new PDO("mysql:host=$servername", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql_banco = "CREATE DATABASE IF NOT EXISTS loja; USE loja";
    $conexao->exec($sql_banco);
    $conexao->exec("USE loja");

    $sql_tabelas_produto = "
    CREATE TABLE IF NOT EXISTS produto (
    id int AUTO_INCREMENT PRIMARY KEY,
    nome_prod VARCHAR(255) NOT NULL,
    preco_prod DECIMAL(10,2) NOT NULL,
    foto_prod VARCHAR(255) NOT NULL,
    destaque_prod BOOLEAN NOT NULL
    )";
    
    $conexao->exec($sql_tabelas_produto);


    $sql_tabelas_usuario = "
    CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(255) UNIQUE NOT NULL,
    email_usuario VARCHAR(255)  UNIQUE NOT NULL,
    senha_usuario VARCHAR(255)  UNIQUE NOT NULL)";

    $conexao->exec($sql_tabelas_usuario);

    echo "Banco e Tabelas Criadas com total Sucesso";

} catch (PDOException $e) {

    echo $sql . "<br>" . $e->getMessage();

}

?>