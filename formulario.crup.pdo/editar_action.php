<?php
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$celular = filter_input(INPUT_POST, 'celular');

if($id && $nome && $email && $celular) {


    $sql = $pdo->prepare("UPDATE usuarios SET 
    nome = :nome, 
    email = :email, 
    celular = :celular 
    WHERE id = :id");
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":celular", $celular);
    $sql->bindValue(":id", $id);
    $sql->execute();
    
    header("Location: index.php");
    exit;

} else {
    header("Location: adcionar.php");
}