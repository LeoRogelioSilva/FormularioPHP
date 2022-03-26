<?php

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if (isset($_POST['senha'])) {
        $senha = md5($_POST['senha']);

        $conexao = mysqli_connect("localhost", "root", "", "bdform");
        if (mysqli_connect_errno($conexao)) {
            echo "Problemas na Conexão Erro:";
            echo mysqli_connect_errno();
            die();
        }
        $query = ("select * from useradmin where email='$email' and senha='$senha'");
        $resultado = mysqli_query($conexao, $query);
        $linhas = mysqli_num_rows($resultado);
        if ($linhas == 0) {
            echo "Usuário não encontrado!";
            unset($_SESSION['email']);
        } else {
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;
            header("Location: painel_de_controle.php");
        }
        mysqli_close($conexao);
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
    <script>
    </script>

</head>
<!--background="src/bgimage.jpg"-->

<body>

    <div class="header_div">
        <br>

        <h1>Olá Admin!</h1>


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