<?php
session_start();
include 'config.php'; // Inclua o arquivo de configuração aqui

// Capture o CPF e a senha do formulário de login
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

// Busca o usuário no banco de dados
$sql = "SELECT senha FROM usuario WHERE cpf = :cpf";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':cpf', $cpf);
$stmt->execute();

// Verifica se o usuário foi encontrado
if ($stmt->rowCount() > 0) {
    // Usuário encontrado
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $hashed_password = $row['senha'];

    // Verifica a senha
    if (password_verify($senha, $hashed_password)) {
        // Senha correta, redireciona para a página principal
        $_SESSION['usuario_logado'] = $cpf; // Armazena o usuário na sessão
        header("Location: pagina_principal.php");
        exit; // Encerra o script após o redirecionamento
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
    
}
?>
<p>Ainda não tem uma conta? <a href="cadas.php">Cadastre-se aqui</a>.</p>