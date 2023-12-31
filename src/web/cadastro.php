<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Consulta Médica - Hospital Antonio Miguel</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e1d6cb; /* Bege claro */
            color: #952f57; /* Marrom escuro */
        }

        header {
            background-color: #952f57; /* Marrom */
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            margin-bottom: 8px;
        }

        input,
        select {
            padding: 8px;
            margin-bottom: 16px;
        }

        button {
            padding: 10px;
            background-color: #952f57; /* Marrom escuro */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.consulta-button {
            background-color: #8d6e63; /* Marrom médio */
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Hospital Antonio Miguel - Consulta Médica</h1>
    </header>

    <section>
        <h2>Cadastro e Login</h2>
        <form id="cadastroLoginForm" method="post" action="../cadastro.php" onsubmit="cadastrarUsuario();">
            <label for="tipoUsuario">Escolha o Tipo de Usuário:</label>
            <select id="tipoUsuario" name="tipo">
                <option value="paciente">Paciente</option>
                <option value="medico">Médico</option>
            </select>

            <label for="nomeUsuario">Nome de Usuário:</label>
            <input type="text" id="nomeUsuario" name="nomeUsuario">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha">

            <button type="submit">Cadastrar</button>
        </form>

        <!-- Remova este trecho se o link não for necessário -->
        <a href="C:\xampp\htdocs\Consulta\agendaconsulta.html">Link para agendaconsulta</a>
    </section>

    <script>
        let usuarios = []; // Armazena informações dos usuários cadastrados

        function cadastrarUsuario() {
            const tipoUsuario = document.getElementById('tipoUsuario').value;
            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;

            // Validação dos campos
            if (!tipoUsuario || !nome || !email || !senha) {
                alert('Preencha todos os campos para cadastrar o usuário.');
                return false; // Evita que o formulário seja enviado
            }

            // Validação do email
            if (!validarEmail(email)) {
                alert('Digite um email válido.');
                return false; // Evita que o formulário seja enviado
            }

            // Criação de um objeto usuário
            const usuario = { id: generateUniqueId(), tipo: tipoUsuario, nome, email, senha };

            // Adiciona o usuário à lista
            usuarios.push(usuario);

            // Limpa os campos do formulário
            document.getElementById('tipoUsuario').value = 'paciente';
            document.getElementById('nome').value = '';
            document.getElementById('email').value = '';
            document.getElementById('senha').value = '';

            alert('Usuário cadastrado com sucesso!');
            console.log('Usuário cadastrado:', usuario);

            // Redireciona para a página de acordo com o tipo de usuário
            if (email.endsWith('@medico.com')) {
                window.location.href = 'file:///C:/xampp/htdocs/Consulta/visualizacaoprontuarios.html';
            } else {
                // Redireciona para a página de agendamento de consulta, por exemplo
                window.location.href = 'file:///C:/Users/cryst/Desktop/Consulta/agendaconsulta.html';
            }

            return false; // Evita que o formulário seja enviado
        }

        function validarEmail(email) {
            // Esta é uma expressão regular simples para validar emails. Pode ser necessário uma validação mais robusta.
            const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regexEmail.test(email);
        }

        // Função para gerar IDs únicos
        function generateUniqueId() {
            return '_' + Math.random().toString(36).substr(2, 9);
        }
    </script>
</body>

</html>