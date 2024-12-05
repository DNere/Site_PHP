<?php
if (isset($_POST['submit'])) {
    include_once('config.php'); // Inclui a conexão com o banco de dados

    // Recebe os dados do formulário
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Preparando a consulta SQL para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO formulario (email, nome, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $nome, $senha); // O "sss" indica que são 3 parâmetros de tipo string

    // Executa a consulta e verifica se foi bem-sucedido
    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logar</title>
    <link rel="stylesheet" href="css/logar.css">
    <script src="js/javascript.js"></script>
    <link rel="website icon" type="png" href="img/logo.png">
</head>
<body>

<div class="container">
    <nav class="nav">
        <div class="logo nav-links"><a href="index.html">Plumas<b>&</b>CIA</a></div>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="logar.php">Logar</a></li>
        </ul>
    </nav>

    <header class="header">
        <h2>Quer aumentar a sua experiência? <b>Crie a sua conta!</b></h2>
        <p class="ne"> Não perca a oportunidade de aproveitar todas as vantagens que oferecemos!</p>
    </header>

    <section class="section">
        <form action="logar.php" method="POST" id="loginForm">
            <label for="email">E-mail:</label>
            <input type="email" name="email" required placeholder="email" id="email">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required placeholder="Login" id="login">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" required placeholder="Senha" id="senha">
            <button type="submit" name="submit" id="submit">Cadastrar-se</button>
        </form>

        <p class="corppp">Já possui uma conta? <b class="corppp"><a href="temconta.html">Clique aqui!</a></b></p>
    </section>

    <article class="article"><br></article>

    <footer class="footer">
        <br>
        <div class="footer-content">  
            <p><b>Entre em contato:</b></p>
            <p><b>Telefone:</b> 19 99550-6397</p>
            <p><b>Email:</b> Daniel.nere@aluno.ifsp.edu.br</p>
        </div>  
        <div class="copyright">
            <p>&copy; 2024 Plumas&CIA. All rights reserved.</p>
        </div>
        <div class="footerlogo">
            <h1>------------------------------------------------------------------------</h1>
            <p>Plumas<b>&</b>CIA</p>
        </div>
    </footer>
</div>
</body>
</html>
