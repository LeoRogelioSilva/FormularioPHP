<?php

$ini = parse_ini_file('../config/database.ini');
$sname = $ini['host'];
$dbname = $ini['dbName'];
$uname = $ini['username'];
$pwd = $ini['password'];

session_start();

echo $_SESSION["email"];
$conexao = mysqli_connect($sname, $uname, $pwd, $dbname);
if (mysqli_connect_errno()) {
    echo "Problemas na Conexão Erro:";
    echo mysqli_connect_errno();
    die();
}
$email = $_SESSION["email"];
$senha = $_SESSION["senha"];
$query = ("select * from useradmin where email='$email' and senha='$senha'");
$resultado = mysqli_query($conexao, $query);
$linhas = mysqli_num_rows($resultado);
if ($linhas == 0) {
    echo "Usuário não encontrado!";
    unset($_SESSION['email']);
} else if ($linhas == 1) {
    while ($row = $resultado->fetch_array()) {
        $id = $row['id'];
        $nome=$row['nome'];
    }
    date_default_timezone_set('America/Sao_Paulo');
    $data = date("Y-m-d h:i:s");
    echo $data;
    $action = "Logout";
    $query = ("insert into historico values ('$nome','$data', '$action', '$id')");
    $resultado = mysqli_query($conexao, $query);
}
unset($_SESSION['email']);
unset($_SESSION['senha']);
session_destroy();
header("location: login.php");
