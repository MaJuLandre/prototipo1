<?php
session_start();
if (!isset($_SESSION['usuario_logado'])) {
    header('Location: index.php'); // Redireciona para a página de login se não estiver logado
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center; /* Alinha a página no centro horizontal */
    align-items: center;     /* Alinha a página no centro vertical */
    height: 100vh;           /* Garante que a altura da tela seja 100% */
}

.container {
    display: flex;
    justify-content: center; /* Centraliza as seções horizontalmente */
    align-items: center;     /* Centraliza as seções verticalmente */
    width: 100%;             /* Certifique-se de que a largura ocupe toda a tela */
    height: 100%;            /* Certifique-se de que a altura ocupe toda a tela */
    box-sizing: border-box;
    padding: 20px;           /* Dê um pouco de espaçamento nas bordas */
}

.activities-section {
    background-color: #fff;
    border-radius: 8px;
    padding: 50px;
    box-shadow: 0 0 60px rgba(0, 0, 0, 0.1);
    overflow-y: auto;
    width: 35%; /* Tamanho do bloco de atividades */
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.activity-list {
    list-style: none;
    padding: 0;
}

.activity-list li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.activity-list li:last-child {
    border-bottom: none;
}

button {
    padding: 10px 15px;
    background-color: #000000;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #333;
}

.update-button {
    position: absolute;
    top: 20px;
    left: 20px;
    padding: 10px 20px;
    background-color: #008CBA;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.update-button:hover {
    background-color: #005f73;
}

.logout-button {
    position: absolute;
    top: 20px;
    right: 20px; /* Coloca o botão "Sair" no canto superior direito */
    padding: 10px 20px;
    background-color: #ff4c4c; /* Cor do botão "Sair", vermelho */
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.logout-button:hover {
    background-color: #d43f3f; /* Hover do botão "Sair" */
}

    </style>
</head>
<body>
    <!-- Botão de "Atualizar dados cadastrais" no canto superior esquerdo -->
    <button class="update-button" onclick="window.location.href='formulario_atualizar.php';">Atualizar dados cadastrais</button>

    <button class="logout-button" onclick="window.location.href='logout.php';">Sair</button>

  
        
        <!-- Atividades -->
        <div class="activities-section">
            <h1>Atividades da Semana</h1>
            <ul class="activity-list">
                <li>
                    <button type="button" >08</button> <button type="button" >09</button> <button type="button" >10</button>
                    <p>Reunião de equipe às 10h</p>
                    <p>Entrega de relatórios</p>
                </li>
                <li>
                    <p>Desenvolvimento de projeto</p>
                    <p>Revisão de código</p>
                </li>
                <li>
                    <h2>Sexta-feira</h2>
                    <p>Planejamento da próxima semana</p>
                    <p>Reunião com clientes</p>
                </li>
            </ul>
        </div>
    </div>
    
</body>
</html>
