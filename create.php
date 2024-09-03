<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Create</title>
</head>
<body>
    <form method="POST" action="create.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <input type="submit" value="Enviar">
    </form>
    <a href="read.php">Ver Cadastros</a> 
    <br>
</body>
</html>

<?php
    include "db.php";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $sql = "INSERT INTO usuario (nome, email) VALUE ('$nome', '$email')";

        if($conn -> query($sql) === true){
            echo "Novo registro adicionado!";
        } else {
            echo "Erro" . $sql . "<br>" . $conn -> error;
        }
    }
    $conn -> close();
?>