<?php

use function PHPSTORM_META\type;

$conn = require "../config/acessa_bd.php";


$nome = $celular = $email = $cep = $rua = $numero = $bairro = $cidade = $uf = $id = "";
$noData = 0;


if (!empty($_POST['acao'])) {
    $pdo = acessarBanco();
    $nome = $_POST['nome'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    $pessoa = new Pessoa($nome,$celular,$email,$cep,$rua,$numero,$bairrp,$cidade,$uf);


    try {
        $pessoa->setData($pdo);
    } catch (Exception $e) {
        echo "<p> errooo </p>";
        echo $e;
    }

    $go = 0;
} else {
    echo "";
}


function get_endereco($cep)
{


    // formatar o cep removendo caracteres nao numericos
    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url = "http://viacep.com.br/ws/$cep/xml/";

    try {
        $xml = simplexml_load_file($url);
    } catch (Exception $e) {
        echo $e;
    }
    return $xml;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../web/css/style1.css">
    <title>Formulário</title>

    <script>
        
    </script>
</head>

<body>
    <header>
        <div class="container" style="text-align: center;">
            <div class="header_div">

                <br>
                <h1>Olá </h1>
                <h3>
                    <a href="../util/login.php" style="color:burlywood;">Login</a>
                </h3>
                <br>

            </div>
    </header>
    <center>

        <div class="div_form ">
            <form id="panel" class="window" method="POST" name="fCadastro" action="pagina_inicial.php">
                <div class=" title-bar">
                    <h2>Cadastro</h2>
                </div>

                <br>
                <label>Nome Completo:
                    <br>
                    <input type="text" required="required" name="nome" class="entrada" placeholder="Insira Seu Nome" value="<?php if (!empty($_POST['nome'])) {
                                                                                                                                echo $_POST['nome'];
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            } ?>"></label>
                <br><br>

                <label>E-Mail
                    <br>
                    <input type="email" required="required" id="email" name="email" placeholder="exemplo@email.com" value="<?php if (!empty($_POST['email'])) {
                                                                                                                                                            echo $_POST['email'];
                                                                                                                                                        } else {
                                                                                                                                                            echo "";
                                                                                                                                                        } ?>"></label>

                <br><br>
                <label>Celular:
                    <br>
                    <input type="text" required="required" name="celular" placeholder="(xx)xxxxx-xxxx" value="<?php if (!empty($_POST['celular'])) {
                                                                                                                    echo $_POST['celular'];
                                                                                                                } else {
                                                                                                                    echo "";
                                                                                                                } ?>"></label>
                <br><br>
                <label>Consulta CEP:
                    <br>
                    <input type="text" name="cep" id="cep" placeholder="000000-000" value="<?php if (!empty($_POST['cep'])) {
                                                                                                echo $_POST['cep'];
                                                                                            } else {
                                                                                                echo "";
                                                                                            } ?>"></label>
                <button type="submit"> Pesquisar Endereço </button>
                <br><br>
                <?php if (!empty($_POST['cep'])) { ?>
                    <p>
                        <?php $endereco = get_endereco($_POST['cep']); ?>
                        <label>CEP:
                            <br>
                            <input type="text" name="cep" required="required" readonly="readonly" value="<?php echo $endereco->cep; ?>">
                        </label>
                        <br><br>
                        <label>Logradouro:
                            <br>
                            <input type="text" id="rua" name="rua" required="required" value="<?php echo $endereco->logradouro; ?>">
                            <br><br>
                        </label>
                        <label>Numero:
                            <br>
                            <input type="number" id="numero" name="numero" required="required" placeholder="000">
                            <br><br>
                        </label>
                        <label>Bairro:
                            <br>
                            <input type="text" id="bairro" name="bairro" required="required" value="<?php echo $endereco->bairro; ?>">
                            <br><br>
                        </label>
                        <label>Cidade:
                            <br>
                            <input type="text" id="cidade" name="cidade" required="required" value="<?php echo $endereco->localidade; ?>">
                            <br><br>
                        </label>
                        <label>UF:
                            <br>
                            <input type="text" id="UF" name="uf" required="required" value="<?php echo $endereco->uf; ?>">
                            <br><br>
                        </label>

                        <label>
                            <input type="checkbox" id="termo" onchange="liberar_envio()"> Eu aceito os temos e condições de uso.

                        </label>
                        <label style="text-align: center;">
                            <p style="text-align: center;">
                                <input type="submit" value="Cadastrar" id="enviar" name="acao" style="text-align: center; display:none" <?php $go = 1 ?>>

                            </p>
                        </label>


                    </p>
                <?php } ?>

            </form>
        </div>

        <hr>
        <div class="form_content">
            <input type="text" id="cpf_gerado" readonly style="display: none">

            <a class="testeimprimir" href="javascript:gera_cpf();" target="_blank"></a>
            <button type="submit" onclick="gera_cpf()">Gerar CPF</button>

        </div>
        <hr>
        <div>
            <input type="text" id="textoCopiar">
            <button id="teste" onclick="copiarTexto()">copiar</button>
        </div>
    </center>
    <footer style="background-color: gray; height: 100px; text-align: center;">
            <h4 style="color: white;">
                <br>
                Contato: <br>
                (12) 99784-9394 <br>
                leorogelio1202@gmail.com <br>
            </h4>
    </footer>

    <script src="../web/js/controle.js"></script>
</body>

</html>