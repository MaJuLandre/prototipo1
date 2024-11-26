<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            width: 90%;
            max-width: 1200px;
            margin-top: 10px;
        }
        .form-section {
            background-color: #fff;
            border-radius: 8px;
            padding: 50px;
            box-shadow: 0 0 60px rgba(0, 0, 0, 0.1);
            width: 30%;
            margin-right: 20px;
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
            background-color: #000;
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
        <div class="form-section">
            <h1>Cadastro</h1>
            <form action="processa_cadastro.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>

                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" required>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

                <label for="numero">Celular:</label>
                <input type="tel" id="numero" name="numero" placeholder="Digite seu celular" required>

                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade" min="0" max="120" placeholder="Digite sua idade" required>

                <label for="instituicao">Instituição:</label>
                <select id="instituicao" name="instituicao" required>
                    <option value="" disabled selected>Selecione sua instituição</option>
                    <option value="universidade1">Universidade 1</option>
                    <option value="etec1">Etec 1</option>
                    <option value="empresa1">Empresa 1</option>
                    <option value="organizacao1">Organização 1</option>
                </select>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Senha" required>

                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>
