<?php
$mysqli = new mysqli("localhost", "root", "", "bdform");

if ($mysqli->connect_errno) {
    die("Database error: " . $mysqli->connect_error);
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$conexao = new mysqli("localhost", "root", "", "bdform");

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
        header("Location: painel_de_controle.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--<link rel="stylesheet" href="style.css">-->
    <style>

    </style>

</head>
<!--background="src/bgimage.jpg"-->

<body>

    <div class="header_div">
        <br>

        <h1>Olá </h1>


        <div class="form_content">
            <div class="form">
                <form id="login" class="window" method="POST" name="fCadastro" action="login.php">
                    <div class="title-bar">
                        <h2>Login</h2>
                    </div>

                    <br>
                    <label>Email:</label>
                    <label>
                        <input type="text" id="email" name="email" placeholder="meuemail@mail.com">
                        <br><br>
                    </label>
                    <label>Senha:
                    </label>
                    <label>
                        <input type="password" id="senha" name="senha">
                    </label>
                    <br><br>
                    <input type="submit" value="Entrar" style="align-items: center;">

                </form>

            </div>
            <div>
                <h2>
                    Não tem cadastro?
                </h2>
                <a href="cadastro_login.php"> Cadastrar </a>
            </div>
        </div>

    </div>

</body>

</html>