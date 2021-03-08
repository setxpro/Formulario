<?php
require 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');

if($id) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {

        $info = $sql->fetch(PDO::FETCH_ASSOC);

    } else {
        header("Location: index.php");
        exit;
    }

} else {
    
    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9fc84ca737.js" crossorigin="anonymous"></script>
    <title>Formulario de cadastro</title>
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
     <div class="container">
            <div class="lefft">
                <div class="asside">
                <h1 class="title">LOCALIZAÇÃO</h1>
                <p>Brasil</br>Rio de janeiro</br>CEP: 23042-420</p>
                </div>
                <div class="social">
                    <h2 class="title_social">SIGA-NOS</h2>
                    <a href=""><i class="fab fa-facebook facebook"></i></a>
                    <a href=""><i class="fab fa-twitter-square twitter"></i></a>
                    <a href=""><i class="fab fa-instagram-square instagram"></i></a>
                    <a href=""><i class="fab fa-google-plus google"></i></a>
                    <p>© 2018 Política de privacidade</p>
                </div>
            </div>
            <div class="rigth">
                <h2 class="Formulario">Formulário de Contato</h2>
            <form method="post" action="editar_action.php">
                <input type="hidden" name="id" value="<?=$info['id'];?>">
                <label>
                    </br>
                    <input type="text" name="nome" placeholder="Enter your Name..." require value="<?=$info['nome'];?>">
                </label><br/><br/>

                <label>
                    </br>
                    <input type="email" name="email" placeholder="Enter your Email..." require value="<?=$info['email'];?>">
                </label><br/><br/>

                <label>
                    </br>
                    <input type="number" name="celular" placeholder="Enter your WhatsApp..." require value="<?=$info['celular'];?>">
                </label></br></br>
                
                <label>
                <input type="checkbox" class="check" require>
                    Declaro que li e aceito os <a href="#">Termos de uso.</a>
                </label></br/></br>
                <input type="submit" value="Atualizar" class="button">
            </form>
        </div>
    </div>
    <footer>
        <div class="author">
            Template Criada por <a href="https://www.instagram.com/seth_ofcc/?hl=pt-br"> Patrick Anjos</a>
        </div>
    </footer>
</body>
</html>