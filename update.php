<?php
    include "./connection.php";
    
    
    function get_user($conn, $id) {
        $new_user = null;
        $response = $conn->query("SELECT * FROM user WHERE id = '$id'");
        if ($response->num_rows > 0) {
            $new_user = $response->fetch_assoc();
        }

        return $new_user;
    }

    $user = null;
    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $user = get_user($conn, $id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['name']) && isset($_POST['email'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $conn->query("UPDATE user SET name = '$name', email = '$email' WHERE id = '$id'");
                $user = get_user($conn, $id);
            }
        }
    }

    $conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <?php if ($user == null): ?>
        <h1>Usuário invalido </h1>    
    <?php else: ?>
        <form method="POST">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="<?= $user["name"] ?>" required>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?= $user["email"] ?>" required>
            <button type="submit">Atualizar</button>
        </form>
    <?php endif ?>
</body>
</html>