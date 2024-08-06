<?php
require_once "usuarios.php";
session_start();

if(isset($_POST['btn-entrar'])):
    $erros = array();
    $login = mysqli_escape_string($connect,$_POST['nome']);
    $senha =  mysqli_escape_string($connect,$_POST['senha']);
    $sql = "SELECT nome FROM usuarios WHERE nome = '$login'";
    $enviar = "INSERT INTO `usuarios` (`nome`, `senha`) VALUES ('$login', '$senha')";
    $resultado = mysqli_query($connect, $sql);
    if ($connect->query($enviar) === TRUE) {
        echo "Novo produto adicionado com sucesso";
    } else {
        echo "Erro: " . $enviar . "<br>" . $conn->error;
    }
    if(empty($login) or empty($senha)):
        echo "todos os dados precisa ser preenchido";
    endif;
    if(mysqli_num_rows($resultado) > 0):
        
    else:
        echo"usuario inexistente";
    endif;
endif;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nome" id="nome" placeholder="nome">
        <input type="password" name="senha" id="senha" placeholder="senha">
        <input type="submit" name="btn-entrar">
    </form>
</body>
</html>