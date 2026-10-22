<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>    


<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <h1>Bem-vindo, <?php htmlspecialchars($_SESSION["usuario"]) ?></h1>
    <p>Esta página é secreta. Só quem faz login consegue ver.</p>
    <a href="sair.php">Sair</a>
</body>
</html>