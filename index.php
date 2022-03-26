<?php

use function PHPSTORM_META\type;

$nome = $celular = $email = $cep = $rua = $numero = $bairro = $cidade = $uf = $id = "";
$noData = 0;
$go = 0;




if ($go == 1 && isset($_POST['acao'])) {
    $pdo = acessarBanco();
    $nome = $_POST['nome'];
    echo $nome;

    $celular = $_POST['celular'];

    $email = $_POST['email'];

    $cep = $_POST['cep'];

    $rua = $_POST['rua'];

    $numero = $_POST['numero'];

    $bairro = $_POST['bairro'];

    $cidade = $_POST['cidade'];

    $uf = $_POST['uf'];
    echo $uf;
    
    try {
        $statement = $pdo->prepare('INSERT INTO userdata VALUES (:nome, :celular, :email, :cep, :rua, :numero, :bairro, :cidade, :uf, :id)');
        $statement->execute([
            'nome' => $nome,
            'celular' => $celular,
            'email' => $email,
            'cep' => $cep,
            'rua' => $rua,
            'numero' => $numero,
            'bairro' => $bairro,
            'cidade' => $cidade,
            'uf' => $uf,
            'id' => $id
        ]);
        echo "cadastrado com sucesso;";
    } catch (Exception $e) {
        echo "<p> errooo </p>";
        echo $e;
    }

    $go = 0;
} else {
    echo "";
}


function acessarBanco()
{
    $ini = parse_ini_file('database.ini');
    $sname = $ini['host'];
    $dbname = $ini['dbName'];
    $uname = $ini['username'];
    $pwd = $ini['password'];
    

    try {
        $conn = new PDO("mysql:host=$sname;", $uname, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("USE $dbname;");
    } catch (PDOException $e) {
        echo 'Erro ao conectar ao banco de dados<br/>';
        echo $e;
        exit;
    }
    return $conn;
}


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
    </div>
    <div class="container">

        <div class="form_content">
            <div class="form">
                <form id="panel" class="window" method="POST" name="fCadastro" action="index.php">
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
                        <input type="email" required="required" name="email" placeholder="exemplo@email.com" value="<?php if (!empty($_POST['email'])) {
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
                        <input type="number" name="cep" id="cep" placeholder="000000-000" value="<?php if ($endereco->cep) {
                                                                                                        echo $endereco->cep;
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
                                <input type="text" id="rua" name="rua" required="required"  value="<?php echo $endereco->logradouro; ?>">
                                <br><br>
                            </label>
                            <label>Numero:
                                <br>
                                <input type="number_format" id="numero" name="numero" required="required" placeholder="000">
                                <br><br>
                            </label>
                            <label>Bairro:
                                <br>
                                <input type="text" id="bairro" name="bairro" required="required" value="<?php echo $endereco->bairro; ?>">
                                <br><br>
                            </label>
                            <label>Cidade:
                                <br>
                                <input type="text" id="cidade" name="cidade" required="required"  value="<?php echo $endereco->localidade; ?>">
                                <br><br>
                            </label>
                            <label>UF:
                                <br>
                                <input type="text" id="UF" name="uf" required="required"     value="<?php echo $endereco->uf; ?>">
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


                            <input type="submit" value="Cadastrar" id="enviar" name="acao" style="display: none;" <?php $go = 1 ?>>

                        </p>
                    <?php } ?>

                </form>

            </div>
        </div>

    </div>

</body>

</html>