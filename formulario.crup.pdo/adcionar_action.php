<?php

require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$celular = filter_input(INPUT_POST, 'celular');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


if($nome && $email && $celular) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(":email", $email);
    $sql->execute();

    if($sql->rowCount() === 0) {


        $sql = $pdo->prepare("INSERT INTO usuarios (nome, celular, email) VALUES (:nome, :celular, :email)");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":celular", $celular);
        $sql->bindValue(":email", $email);
        $sql->execute();
    
        header("Location: index.php");
        exit;
    
    } else {
        header("Location: adcionar.php");
        exit;
    }

} else {
    header("Location: adcionar.php");
        exit;
}