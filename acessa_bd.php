<?php
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

        $bd = "$dbname";
        $verifica = $conexao_pdo->exec(
            "CREATE DATABASE IF NOT EXISTS $bd;
    GRANT ALL ON $bd.* TO '$uname'@'$sname';
    FLUSH PRIVILEGES;"
        );
        if (!$verifica) {
            echo 'Falha ao criar banco de dados!';
        }
        exit;
    }
    return $conn;
}
?>