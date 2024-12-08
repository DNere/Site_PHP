<?php 
// Inicia uma sessão ou retoma a existente para usar variáveis de sessão
session_start();

// Inclui o arquivo de configuração do banco de dados, onde está a conexão
require_once 'config.php';

// Inclui o arquivo "msg.php", que pode conter funções auxiliares ou mensagens a serem exibidas
include('msg.php');

// Verifica se o método da requisição HTTP é POST (envio de formulário)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém o valor do campo "email" enviado pelo formulário
    $email = $_POST["email"];

    // Prepara a consulta SQL para deletar um registro da tabela "formulario" com o email fornecido
    $stmt = $conn->prepare("DELETE FROM formulario WHERE email = ?");

    // Associa o parâmetro da consulta SQL à variável $email
    // "s" indica que o tipo do parâmetro é string (texto)
    $stmt->bind_param("s", $email);

    // Executa a consulta preparada e verifica se foi bem-sucedida
    if ($stmt->execute()) {
        // Armazena uma mensagem de sucesso na variável de sessão
        $_SESSION['message'] = "Usuário excluído com sucesso.";
        
        // Redireciona o usuário para a página inicial (index.php)
        header("Location: index.php");
        exit(0); // Encerra o script após o redirecionamento
    } else {
        // Em caso de erro na execução, exibe a mensagem de erro
        echo "Erro ao deletar: " . $stmt->error;
    }

    // Fecha o statement preparado
    $stmt->close();

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
    <title>Deletar Usuário</title>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Deletar Usuário
                <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
            </h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label>Email: </label>
                    <input type="text" name="email" value="<?= $_GET['email'] ?>" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label>Nome: </label>
                    <input type="text" name="nome" value="<?= $_GET['nome'] ?>" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label>Senha: </label>
                    <input type="text" name="senha" value="<?= $_GET['senha'] ?>" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <button type="submit" name="atualizar_pessoa" class="btn btn-primary">Remover pessoa</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
