<?php
include 'config.php'; // Inclua o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $idade = $_POST['idade'];
    $instituicao = $_POST['instituicao'];
    $senha = $_POST['senha'];

    // Criptografando a senha
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

    // Inserindo dados no banco de dados
    $sql = "INSERT INTO usuario (nome, cpf, email, numero, idade, instituicao, senha) VALUES ('$nome', '$cpf', '$email', '$numero', '$idade', '$instituicao', '$hashed_password')";

    if ($pdo->exec($sql)) {
        echo "Cadastro realizado com sucesso! <a href='index.php'>Voltar ao Login</a>";
    } else {
        echo "Erro: " . $sql . "<br>" . $pdo->errorInfo();
    }
}
?>
