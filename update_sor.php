<?php
    include 'db.php';
    $id = $_GET['id'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $sql = "UPDATE usuario SET nome = '$nome', email = '$email' WHERE id = '$id'";

        if($conn -> query($sql) === true){
            echo "Registro atualizado com sucesso!";
        } else {
            echo "Erro" . $sql . "<br>" . $conn -> error;
        }
        $conn -> close();
        header("Location: read.php");
        exit();
    }
    $sql = "SELECT * FROM usuario WHERE id = '$id'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update do Ícaro</title>
</head>
<body>
    <form method="POST" action="update_sor.php?id=<?php echo $row['id'];?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome'];?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email'];?>" required>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>