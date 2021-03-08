<?php
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");
if($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Cadastro</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1 class="h1_index">Tabela de usuários Cadastrados</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>WhasApp</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <?php foreach($lista as $usuario): ?>
            <tr>
                <td><?php echo $usuario['id'];?></td>
                <td><?php echo $usuario['nome'];?></td>
                <td><?php echo $usuario['email'];?></td>
                <td><?php echo $usuario['celular'];?></td>
                <td><a href="editar.php?id=<?= $usuario['id'];?>" class="edit">✏️</a></td>
                <td><a href="excluir.php?id=<?= $usuario['id'];?>">🗑️</a></td >
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>