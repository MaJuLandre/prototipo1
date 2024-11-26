<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_logado'])) {
    header('Location: index.php'); // Redireciona para o login se não estiver logado
    exit();
}

// Conectar ao banco de dados
$host = 'localhost'; // ou o seu host do MySQL
$dbname = 'eventos'; // Nome do banco de dados
$username = 'root'; // Usuário do MySQL
$password = ''; // Senha do MySQL

// Conectar com PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
    exit();
}

// Obter o CPF do usuário logado (agora estamos usando o CPF, não o ID)
$cpf_usuario = $_SESSION['usuario_logado']; // CPF do usuário armazenado na sessão

// Buscar os dados do usuário no banco com o CPF
$stmt = $pdo->prepare("SELECT * FROM usuario WHERE cpf = :cpf");
$stmt->execute(['cpf' => $cpf_usuario]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar se os dados do usuário foram encontrados
if (!$usuario) {
    echo "Usuário não encontrado!";
    exit();
}


// Atualizar os dados do usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pegar os dados do formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $idade = $_POST['idade'];
    $instituicao = $_POST['instituicao'];
    $senha = $_POST['senha'];

    // Verificar se a senha foi alterada
    if (!empty($senha)) {
        $senha = password_hash($senha, PASSWORD_DEFAULT); // Criptografar a senha
        $sql = "UPDATE usuario SET nome = :nome, cpf = :cpf, email = :email, numero = :numero, idade = :idade, instituicao = :instituicao, senha = :senha WHERE cpf = :cpf_usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nome' => $nome,
            'cpf' => $cpf,
            'email' => $email,
            'numero' => $numero,
            'idade' => $idade,
            'instituicao' => $instituicao,
            'senha' => $senha,
            'cpf_usuario' => $cpf_usuario 
        ]);
    } else {
        // Caso a senha não tenha sido alterada, atualiza sem a senha
        $sql = "UPDATE usuario SET nome = :nome, cpf = :cpf, email = :email, numero = :numero, idade = :idade, instituicao = :instituicao WHERE cpf = :cpf_usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nome' => $nome,
            'cpf' => $cpf,
            'email' => $email,
            'numero' => $numero,
            'idade' => $idade,
            'instituicao' => $instituicao,
            'cpf_usuario' => $cpf_usuario 
        ]);
    }

    // Mensagem de sucesso
    echo "Dados atualizados com sucesso!";
    header("Location: pagina_principal.php"); // Redireciona para a página principal após a atualização
exit();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Dados</title>
    <style>
        /* O mesmo estilo de antes */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin-top: 60px;
            width: 100%;
        }
        .form-section {
            background-color: #fff;
            border-radius: 8px;
            padding: 50px;
            box-shadow: 0 0 60px rgba(0, 0, 0, 0.1);
            width: 60%;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
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
    </style>
</head>
<body>

    <div class="container">
        <!-- Formulário para atualizar dados -->
        <div class="form-section">
            <h1>Atualizar Dados Cadastrais</h1>
            <form method="POST" action="formulario_atualizar.php">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" required>

                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" value="<?php echo $usuario['cpf']; ?>" required>
                
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>

                <label for="numero">Celular:</label>
                <input type="tel" id="numero" name="numero" value="<?php echo $usuario['numero']; ?>" required>

                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade" min="0" max="120" value="<?php echo $usuario['idade']; ?>" required>
                
                <label for="instituicao">Instituição:</label>
                <select id="instituicao" name="instituicao" required>
                    <option value="universidade1" <?php echo ($usuario['instituicao'] == 'universidade1') ? 'selected' : ''; ?>>Universidade 1</option>
                    <option value="etec1" <?php echo ($usuario['instituicao'] == 'etec1') ? 'selected' : ''; ?>>Etec 1</option>
                    <option value="empresa1" <?php echo ($usuario['instituicao'] == 'empresa1') ? 'selected' : ''; ?>>Empresa 1</option>
                    <option value="organizacao1" <?php echo ($usuario['instituicao'] == 'organizacao1') ? 'selected' : ''; ?>>Organização 1</option>
                </select>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite uma nova senha (se desejar alterar)">

                <button type="submit">Atualizar</button>
            </form>
        </div>
    </div>
</body>
</html>
