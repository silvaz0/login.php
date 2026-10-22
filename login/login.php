<?php
session_start();
$mensagem = "";

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
     $usuário = $_POST["usuario"];
     $senha = $_POST["senha"];

     if ($usuário === "admin" && $senha === "1234") {
        $_SESSION['usuario'] = $usuário;
        header("Location: painel.php");
        exit;
     } else {
        $mensagem = "Usuário ou senha incorretos.";
     }
 }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Entrar</h1>
    <p><?= $mensagem ?></p>
    <form method="post">
        <p><input type="text" name="usuario" placeholder="Usuário"></p>
        <p><input type="password" name="senha" placeholder="Senha"></p>
        <button>Entrar</button>
    </form>
</body>
</html>