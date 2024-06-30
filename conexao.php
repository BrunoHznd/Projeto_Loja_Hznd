<?php 

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conexao = new PDO("mysql:host=$servername", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql_banco = "CREATE DATABASE IF NOT EXISTS loja; USE loja";
    $conexao->exec($sql_banco);

    $sql_tabelas = "
    CREATE TABLE IF NOT EXISTS cadastro_produto (
    id int AUTO_INCREMENT PRIMARY KEY,
    nome_prod VARCHAR(255) NOT NULL,
    preco_prod DECIMAL(10,2) NOT NULL,
    foto_prod VARCHAR(255) NOT NULL);
    
    CREATE TABLE IF NOT EXISTS cadastro_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(255) NOT NULL,
    email_cliente VARCHAR(255) NOT NULL,
    senha_cliente VARCHAR(255) NOT NULL)";

    $conexao->exec($sql_tabelas);

}

?>