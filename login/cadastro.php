<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = trim($_POST["usuario"]);
    $senha = $_POST["senha"];


if (file_exists("usuarios.json")) {
    $usuarios = json_decode(file_get_contents("usuarios.json"), true);
} else {
    $usuarios = [];
 }
 
    if ($usuario === "") {
        $mensagem = "Digite um nome de usuário"; 
    } elseif (strlen($senha) < 4) {
        $mensagem = "A senha precisa ter pelo menos 4 caracteres.";
    } elseif (isset($usuarios[$usuario])) {
        $mensagem = "Esse usuário já existe. Escolha outro.";
    } else {
        $usuarios[$usuario] = password_hash($senha, PASSWORD_DEFAULT);
        file_put_contents("usuarios.json", json_encode($usuarios));
        $mensagem = "Conta criada com sucesso! ir para o Login.";
    }
}
 ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="cartao">
        <h1>Criar conta</h1>
        <p class="subtitulo">Esolha um usuario e uma senha</p>
        <p class="mensagem"><strong><?= htmlspecialchars($mensagem) ?></strong></p>
        <form method="post">
            <p><input type="text" name="usuario" placeholder="Escolher um usuário"></p>
            <p><input type="password" name="senha" placeholder="Escolha uma senha"></p>
            <button>Cadastrar</button>
        </form>
        <p class="links"><a href="login.php">já tenho conta</a></p>
        </body>
        </html>
    </main>