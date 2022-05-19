<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if (isset($_POST['senha'])) {
        $senha = md5($_POST['senha']);
        
        $ini = parse_ini_file('../config/database.ini');
        $sname = $ini['host'];
        $dbname = $ini['dbName'];
        $uname = $ini['username'];
        $pwd = $ini['password'];

        $conexao = mysqli_connect($sname,   $uname, $pwd, $dbname);
        if (mysqli_connect_errno()) {
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
            header("Location: ../view/painel_de_controle.php");
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
    <link rel="stylesheet" href="../web/css/style1.css">
    <title>Login</title>
    <script>
    </script>

</head>

<body>

    <div class="header_div">
        <br>
        <header>
            <div class="header_div">
                <h1>Olá Admin! </h1>
                <h3>
                    <a href="../index.php">Página Inicial</a>
                </h3>
            </div>
            <br>
        </header>
    </div>

    <center>
        <div class="form_content">
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


            <h2>
                Não tem cadastro?
            </h2>
            
            <a href="cadastro_login.php"> <button> Cadastrar </button></a>

        </div>
    </center>
    <footer style="background-color: black; height: 100px; text-align: center;">
        <h4 style="color:burlywood;">
            <br>
            Contato: <br>
            (12) 99783-9394 <br>
            leorogelio1202@gmail.com <br>
        </h4>


    </footer>

</body>

</html>