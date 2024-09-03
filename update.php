<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Update</title>
</head>
<body>
    <form method="POST" action="update.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <label for="email_antigo">Email Antigo:</label>
        <input type="email" name="email_antigo" required>
        <label for="email_novo">Email Novo:</label>
        <input type="email" name="email_novo" required> 
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
    include "db.php";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email_novo = $_POST['email_novo'];
        $email_antigo = $_POST['email_antigo'];
        $sql = "UPDATE usuario SET nome = '$nome', email = '$email_novo' WHERE email = '$email_antigo'";

        if($conn -> query($sql) === true){
            echo "Registro atualizado com sucesso!";
        } else {
            echo "Erro" . $sql . "<br>" . $conn -> error;
        }
    }
    $conn -> close();
?>