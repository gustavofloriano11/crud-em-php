<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Read</title>
</head>
<body>
    <form method="POST" action="read.php">
        <label for="email">Insira seu Email:</label>
        <input type="email" name="email" required>
        <input type="submit" value="Consultar seus Dados">  
    </form> 
    <a href="read.php">Ver Cadastros</a> 
    <br>
</body>
</html>

<?php
    include 'db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0){
            echo "<table border='1'>
                <tr>
                    <th> ID </th>
                    <th> Nome </th>
                    <th> Email </th>
                    <th> Data de Criação </th>
                    <th> Ações </th>
                </tr>";
            while($row = $result -> fetch_assoc()){
                echo "<table border='1'>
                <tr>
                    <td> {$row['id']} </td>
                    <td> {$row['nome']} </td>
                    <td> {$row['email']} </td>
                    <td> {$row['criado_em']} </td>
                    <td> Ações </td>
                    <td>
                        <a href='update_sor.php?id={$row['id']}'>Editar</a> |
                        <a href='delete.php?id={$row['id']}'>Deletar</a>
                    </td>
                </tr>"; 
            }
            echo "</table>";
        }else{
            echo "Nenhuma pessoa cadastrada";
        }
        
    }
$conn -> close();
?>