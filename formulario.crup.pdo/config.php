<?php

try {
    
$db_name = 'site';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

    $pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);

} catch(PDOException $erro) {
    echo "Erro Com o Banco de Dados".$erro->getMessage();

} catch(Exception $erro) {
    echo "Erro Generico".$erro->getMessage();
}