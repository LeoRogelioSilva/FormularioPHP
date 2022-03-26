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
</head>
<body>
    
</body>
</html>