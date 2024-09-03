<?php
    include "./connection.php";
    $response = $conn->query("SELECT * FROM user");
    $users = array();

    while($row = $response->fetch_assoc()) {
        array_push($users, $row);
    }

    $conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
</head>
<body>
    <?php foreach ($users as $user): ?>
    <div>
        <p>Nome: <?= $user["name"]?> </p>
        <p>Email: <?= $user["email"]?> </p>
        <a href="update.php?id=<?= $user["id"]?>">Alterar</a>
        <a href="delete.php?id=<?= $user["id"]?>">Deletar</a>
    </div>
    <hr>
    <?php endforeach ?>
</body>
</html>