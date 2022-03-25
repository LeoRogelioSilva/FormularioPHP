<?php

function get_endereco($cep)
{


    // formatar o cep removendo caracteres nao numericos
    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url = "http://viacep.com.br/ws/$cep/xml/";

    $xml = simplexml_load_file($url);
    return $xml;
}

?>


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
                <form id="panel" class="window" method="post" name="fCadastro" onsubmit="return validar()">
                    <div class="title-bar">
                        <h2>Cadastro</h2>
                    </div>

                    <br>
                    <label>Nome Completo:
                        <br>
                        <input type="text" required="required" name="nome" class="entrada" placeholder="Insira Seu Nome" value="<?php if ($_POST['nome']) {
                                                                                                                                    echo $_POST['nome'];
                                                                                                                                } else {
                                                                                                                                    echo "";
                                                                                                                                } ?>"></label>
                    <br><br>

                    <label>E-Mail
                        <br>
                        <input type="email" required="required" name="email" placeholder="exemplo@email.com" value="<?php if ($_POST['email']) {
                                                                                                                        echo $_POST['email'];
                                                                                                                    } else {
                                                                                                                        echo "";
                                                                                                                    } ?>"></label>

                    <br><br>
                    <label>Celular:
                        <br>
                        <input type="text" required="required" name="celular" placeholder="(xx)xxxxx-xxxx" value="<?php if ($_POST['celular']) {
                                                                                                                        echo $_POST['celular'];
                                                                                                                    } else {
                                                                                                                        echo "";
                                                                                                                    } ?>"></label>
                    <br><br>

                    <label>Consulta CEP:
                        <br>
                        <input type="number" name="cep" id="cep" placeholder="000000-000" value="<?php if ($endereco->cep) {
                                                                                                        echo $endereco->cep;
                                                                                                    } else {
                                                                                                        echo "";
                                                                                                    } ?>"></label>
                    <button type="submit" > Pesquisar Endereço </button>
                    <br><br>
                    <?php if ($_POST['cep']) { ?>
                        <p>
                            <?php $endereco = get_endereco($_POST['cep']); ?>
                            <label>CEP:
                                <br>
                                <input type="text" required="required" readonly="readonly" value="<?php echo $endereco->cep; ?>">
                            </label>
                            <br><br>
                            <label>Logradouro:
                                <br>
                                <input type="text" id="rua" required="required" readonly="readonly" value="<?php echo $endereco->logradouro; ?>">
                                <br><br>
                            </label>
                            <label>Numero:
                                <br>
                                <input type="number_format" id="numero" required="required" placeholder="000">
                                <br><br>
                            </label>
                            <label>Bairro:
                                <br>
                                <input type="text" id="bairro" required="required" readonly="readonly" value="<?php echo $endereco->bairro; ?>">
                                <br><br>
                            </label>
                            <label>Cidade:
                                <br>
                                <input type="text" id="cidade" required="required" readonly="readonly" value="<?php echo $endereco->localidade; ?>">
                                <br><br>
                            </label>
                            <label>UF:
                                <br>
                                <input type="text" id="UF" required="required" readonly="readonly" value="<?php echo $endereco->uf; ?>">
                                <br><br>
                            </label>
                            <label>
                                <input type="checkbox" id="termo" onclick="liberar_envio()"> Eu aceito os temos e condições de uso.
                                <br>
                            </label>
                            <script>
                                function liberar_envio() {
                                    document.getElementById("enviar").style.display = "block";

                                };
                            </script>


                            <input type="submit" value="Cadastrar" id="enviar" style="display: none;">

                        </p>
                    <?php } ?>

                </form>

            </div>
        </div>

    </div>

</body>

</html>