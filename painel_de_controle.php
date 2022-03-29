<?php
include "valida_sessao.php";

use function PHPSTORM_META\type;

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

        $detalhes_pdo = "mysql:host=$sname;";
        try {
            $conexao_pdo = new PDO($detalhes_pdo, $uname, $pwd);
        } catch (PDOException $e) {
            print "Erro: " . $e->getMessage() . "<br/>";
            die();
        }

        $bd = "bdform";
        $verifica = $conexao_pdo->exec(
            "CREATE DATABASE IF NOT EXISTS '$bd';
    GRANT ALL ON '$bd'.* TO 'root'@'localhost';
    FLUSH PRIVILEGES;"
        );
        if ($verifica) {
            echo 'Banco de dados criado com sucesso!';
        } else {
            echo 'Falha ao criar banco de dados!';
        }
        exit;
    }
    return $conn;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Painel de Controle</title>
    <style>
        table,
        td,
        th {
            border: 1px solid;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            transition: width 0.4s ease-in-out;
        }

        .container {
            text-align: center;
            align-items: center;
            width: 80%;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        input[type=text]:focus {
            width: 100%;
        }
    </style>
</head>


<body style="background-color: #f2f2f2;">

<div class="header_div">
        <header style="background-color: black; height: 150px; text-align: center;">
            <br>
            <div class="header_div">
                <h1 style="color:burlywood;">Painel de Controle </h1>
                <h3>
                    <a href="logout.php">Logout</a>
                </h3>
            </div>
            <br>
        </header>
    </div>
    <div class="container">


        <div style="text-align: left;">
            <br>
            <br>

            <form action="painel_de_controle.php" method="POST">
                <label>
                    Buscar por:
                </label>
                <label>
                    <select name="busca" id="busca" onchange="liberar_envio()">
                        <option value="id"> - </option>
                        <option value="id">ID</option>
                        <option value="nome">NOME</option>
                        <option value="celular">CELULAR</option>
                        <option value="email">EMAIL</option>
                        <option value="cidade">CIDADE</option>
                        <option value="uf">UF</option>
                        <option value="cep">CEP</option>
                    </select>
                </label>
                <script>
                    function liberar_envio() {
                        document.getElementById("input").style.display = "block";
                        document.getElementById("input").nodeValue = document.getElementById("busca");
                    };
                </script>
                <br>
                <label>
                    Buscar: <input type="text" name="input" id="input" style="display: none;">
                </label>
                <br>
                <input type="submit" value="enviar" id="submit" name="acao">


            </form>
        </div>
        <?php if (isset($_POST['acao'])) {
            $busca = $_POST['busca'];
            if (isset($_POST['input'])) {
                $input = $_POST['input'];
            }

        ?>
            <div class="tabela">
                <table>
                    <tr>
                        <td>
                            ID
                        </td>
                        <td>
                            NOME
                        </td>
                        <td>
                            CELULAR
                        </td>
                        <td>
                            EMAIL
                        </td>
                        <td>
                            CEP
                        </td>
                        <td>
                            LOGRADOURO
                        </td>
                        <td>
                            NUMERO
                        </td>
                        <td>
                            BAIRRO
                        </td>
                        <td>
                            CIDADE
                        </td>
                        <td>
                            UF
                        </td>
                    </tr>
                    <hr>
                    <tr>
                        <td colspan="10">
                            <hr>
                        </td>
                    </tr>
                    <?php
                    $pdo = acessarBanco();

                    try {
                        switch ($busca) {
                            case 'id':
                                $statement = $pdo->prepare('SELECT * FROM userdata WHERE id = :input');
                                break;
                            case "nome":
                                $statement = $pdo->prepare('SELECT * FROM userdata WHERE nome = :input');
                                break;
                            case "email":
                                $statement = $pdo->prepare('SELECT * FROM userdata WHERE email = :input');
                                break;
                            case "celular":
                                $statement = $pdo->prepare('SELECT * FROM userdata WHERE celular = :input');
                                break;
                            case "cep":
                                $statement = $pdo->prepare('SELECT * FROM userdata WHERE cep = :input');
                                break;
                            case "cidade":
                                $statement = $pdo->prepare('SELECT * FROM userdata WHERE cidade = :input');
                                break;
                            case "uf":
                                $statement = $pdo->prepare('SELECT * FROM userdata WHERE uf = :input');
                                break;
                        }

                        $statement->execute(['input' => $input]);
                        $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($resultado as $item) {
                            echo "<tr>";
                            echo "<td> ";
                            echo $item['id'];
                            echo "</td>";
                            foreach ($item as $campo) {
                                if ($item['id'] == $campo) {
                                    break;
                                }
                                echo "<td>$campo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            }
                            echo "</tr>";
                        }
                        //header("Location: painel_de_controle.php");
                    } catch (Exception $e) {
                        echo "<p> errooo </p>";
                        echo $e;
                    }
                    ?>
                </table>
            </div>
        <?php
        } ?>
        <br>
        <hr>
        <br>

        <div class="tabela">
            <table>
                <tr>

                    <td>
                        ID
                    </td>
                    <td>
                        NOME
                    </td>
                    <td>
                        CELULAR
                    </td>
                    <td>
                        EMAIL
                    </td>
                    <td>
                        CEP
                    </td>
                    <td>
                        LOGRADOURO
                    </td>
                    <td>
                        NUMERO
                    </td>
                    <td>
                        BAIRRO
                    </td>
                    <td>
                        CIDADE
                    </td>
                    <td>
                        UF
                    </td>
                </tr>
                <hr>
                <tr>
                    <td colspan="10">
                        <hr>
                    </td>
                </tr>
                <?php
                $pdo = acessarBanco();

                try {
                    $statement = $pdo->prepare('SELECT * FROM userdata');
                    $statement->execute([]);
                    $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($resultado as $item) {
                        echo "<tr>";
                        echo "<td> ";
                        echo $item['id'];
                        echo "</td>";
                        foreach ($item as $campo) {
                            if ($item['id'] == $campo) {
                                break;
                            }
                            echo "<td>$campo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        }
                        echo "</tr>";
                    }
                    //header("Location: painel_de_controle.php");
                } catch (Exception $e) {
                    echo "<p> errooo </p>";
                    echo $e;
                }
                ?>
            </table>
        </div>
    </div>
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