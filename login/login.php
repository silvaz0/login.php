<?php
session_start();
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if (file_exists("usuarios.json")) {
        $usuarios = json.decode(file_get_contents("usuarios.json"), true);
    } else {
        $usuarios = [];
    }

    if (isset($usuarios[$usuario]) && passaword_verify($senha,$usuarios[$usuario])) {
        $_SESSION["usuario"] = $usuario;
        header["Location: painel.php"];
        exit;
    } else{
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="cartao">
        <h1>Entrar</h1>
        <p class="subtitulo">Digite seus dados para acessar</p>
        <p class="mensagem"><?= $mensagem ?></p>
        <form method="post">
            <p><input type="text" name="usuario" placeholder="Usuário"></p>
            <p><input type="password" name="senha" placeholder="senha"></p>
            <button>Entrar</button>
        </form>
        <p class="links"><a href="cadastro.php">Criar conta</a></p>
    </main>
</body>
</html>