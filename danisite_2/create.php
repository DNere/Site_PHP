<?php
// Inicia uma nova sessão ou retoma a existente
session_start();

// Inclui o arquivo de configuração do banco de dados (contém variáveis de conexão, por exemplo)
require_once 'config.php';

// Inclui o arquivo msg.php, que pode conter funções ou mensagens para exibição
include('msg.php');

// Verifica se o método da requisição é POST (envio de formulário)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os valores enviados pelo formulário e os armazena em variáveis
    $email = $_POST["email"];
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    // Monta uma consulta SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO formulario (email, nome, senha) VALUES ('$email', '$nome', '$senha')";

    // Executa a consulta e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        // Define uma mensagem de sucesso na sessão
        $_SESSION['message'] = "Usuário inserido com sucesso.";
        
        // Redireciona o usuário para a página index.php
        header("Location: index.php");
        exit(0); // Encerra o script após o redirecionamento
    } else {
        // Em caso de erro, exibe a mensagem de erro junto com a consulta
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
    <title>Inserir Usuário</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Adicionar Pessoa
                    <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                </h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Salvar Usuário</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
