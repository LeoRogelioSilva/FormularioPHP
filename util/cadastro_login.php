<?php

if (isset($_POST['acao'])) {
    
    require "../config/acessa_bd.php";
    $pdo = acessarBanco();

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $id = "";

    try {
        $statement = $pdo->prepare('INSERT INTO useradmin VALUES (:nome, :email, :senha, :id)');
        $statement->execute([
            'nome' => $nome,
            'email' => $email,
            'senha' => md5($senha),
            'id' => $id
        ]);
        header("Location: ../view/painel_de_controle.php");
    } catch (Exception $e) {
        echo "<p> errooo </p>";
        echo $e;
    }
} else {
    echo "";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Login</title>
    <link rel="stylesheet" href="../web/css/style1.css">
    <style>

    </style>

</head>
<!--background="src/bgimage.jpg"-->

<body>

    <div class="header_div">
        <br>
        <header>
            <div class="header_div">
                <h1>Olá! </h1>
                <h3>
                    <a href="../index.php">Página Inicial</a>
                </h3>
            </div>
            <br>
        </header>
    </div>

    <center>
        <div class="form_content">
            <form id="login" class="window" method="post" name="fCadastro" action="cadastro_login.php">
                <div class="title-bar">
                    <h2>Cadastro de Login</h2>
                </div>

                <br>
                <label>Nome:</label>
                <label>
                    <input type="text" id="email" name="nome" placeholder="João">
                    <br><br>
                </label>
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

                <input type="submit" value="Cadastrar" name="acao">

            </form>
        </div>
    </center>


    <div>
        <footer style="background-color: black; height: 100px; text-align: center;">
            <h4 style="color:burlywood;">
                <br>
                Contato: <br>
                (12) 99783-9394 <br>
                leorogelio1202@gmail.com <br>
            </h4>


        </footer>
    </div>


</body>

</html>