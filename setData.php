<?php
$nome = $_POST['nome'];
$celular = $_POST['celular'];
$email = $_SESSION['email'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];


$mysqli = new mysqli("localhost", "user", "", "bdform");

if ($mysqli->connect_errno) {
    die("Database error: " . $mysqli->connect_error);
}

$mysqli->query("INSERT INTO users
VALUES 
('myuser', MD5('clearpassword'))");
?>