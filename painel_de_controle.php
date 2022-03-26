<?php

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
        echo 'Erro ao conectar ao banco de dados<br/>';
        echo $e;
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
    <title>Painel de Controle</title>
    <style>
        table,
        th {
            border: 1px solid;
        }
    </style>
</head>


<body>

    <div>
        <header>
            <h1>
                Painel de Controle
            </h1>

        </header>
    </div>
    <div class="container">
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
                    <td colspan="9">
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
        <div>
            <br>
            <br>

            <form action="painel_de_controle.php">
                <label>
                    Buscar por:
                </label>
                <select name="busca" id="busca" onchange="liberar_envio()">
                    <option value="id">ID</option>
                    <option value="nome">NOME</option>
                    <option value="celular">CELULAR</option>
                    <option value="email">EMAIL</option>
                    <option value="rua">RUA</option>
                    <option value="bairro">BAIRRO</option>
                    <option value="cidade">CIDADE</option>
                    <option value="uf">UF</option>
                    <option value="cep">CEP</option>
                </select>
                <script>
                    function liberar_envio() {
                        document.getElementById("input").style.display = "block";
                        document.getElementById("input").nodeValue = document.getElementById("busca");
                    };
                </script>
                <br>
                Buscar: <input type="text" name="" id="input" style="display: none;">
                <input type="submit" value="enviar" id="submit" name="acao">


            </form>
        </div>
        <?php if(isset($_POST['acao'])){
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
                    <td colspan="9">
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
        <?php
        }?>
    </div>
</body>
</html>