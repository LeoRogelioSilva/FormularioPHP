<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
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
                <form action="setData.php" method="POST">
                </form>
                <form id="login" class="window" method="post" name="fCadastro" action="valida_sessao.php">
                    <div class="title-bar">
                        <h2>Login</h2>
                    </div>

                    <br>
                    <label>Email:</label>
                    <label>
                        <input type="text" id="email" placeholder="meuemail@mail.com">
                        <br><br>
                    </label>
                    <label>Senha:                  
                    </label>
                    <label>
                        <input type="password" id="senha">
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