<?php

$mysqli = new mysqli("localhost", "root", "", "bdform");

if ($mysqli->connect_errno) {
    die("Database error: " . $mysqli->connect_error);
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = ("select * from userdata where email='$email'");
$resultado = mysqli_query($conexao, $query);
$linhas = mysqli_num_rows($resultado);
if ($linhas == 0) {
    echo "Usuário não encontrado!";
    echo "<button type='submit' action='index.php'>Voltar</button>";
} else {
    //$res_senha=" ";
    while ($row = mysqli_fetch_array($resultado)) {
        $emailu = $row['email'];
        $senhau = $row['senha'];
    }
    if ($senha != $senhau) {
        echo "<h1><center>Senha está incorreta!</center><br><h1>";
        echo "<center><a href='login.php'>Voltar</a></center>";
    } else {
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["senha"] = $senha;
        header("Location: index.php");
    }
}
mysqli_close($conexao);
?>