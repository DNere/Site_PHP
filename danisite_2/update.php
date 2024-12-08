<?php 
// Inicia uma nova sessão ou retoma uma sessão existente
session_start();

// Inclui o arquivo de configuração do banco de dados
require_once 'config.php';

// Inclui o arquivo de mensagens
include('msg.php');

// Verifica se foi passado um parâmetro 'email' pela URL (método GET)
if (isset($_GET['email'])) {
    // Armazena o email enviado via GET na variável de sessão (A variável `$_SESSION['email_veio']` será usada para identificar qual registro no banco de dados deve ser atualizado.)
    $_SESSION['email_veio'] = $_GET['email'];
}

// Verifica se o formulário foi enviado pelo método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Captura os valores enviados pelo formulário
    $email = $_POST["email"]; // Novo email informado pelo usuário
    $nome = $_POST["nome"];   // Novo nome informado pelo usuário
    $senha = $_POST["senha"]; // Nova senha informada pelo usuário

    // Recupera o email original armazenado na variável de sessão
    $email_veio = $_SESSION['email_veio'];

    // Cria a consulta SQL para atualizar os dados na tabela (Atualiza os campos `email`, `nome` e `senha` onde o email original (recebido pelo GET) corresponde a `$email_veio`.)
    $sql = "UPDATE formulario SET email = '$email', nome = '$nome', senha = '$senha' WHERE email = '$email_veio'";

    // Executa a consulta no banco de dados
    if ($conn->query($sql) === TRUE) {
        // Define uma mensagem de sucesso na sessão
        $_SESSION['message'] = "Usuário atualizado com sucesso.";
        // Redireciona para a página `index.php` após a atualização
        header("Location: index.php");
        exit(0); // Encerra a execução do script
    } else {
        // Exibe uma mensagem de erro se a consulta falhar
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Usuário</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Atualizar Usuário
                    <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                </h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label>Email: </label>
                        <input type="text" name="email" value="<?= $_GET['email'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nome: </label>
                        <input type="text" name="nome" value="<?= $_GET['nome'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Senha: </label>
                        <input type="text" name="senha" value="<?= $_GET['senha'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="atualizar_pessoa" class="btn btn-primary">Atualizar Pessoa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>
