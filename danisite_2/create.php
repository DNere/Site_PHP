<?php
session_start();
require_once 'config.php';
include('msg.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

$sql = "INSERT INTO formulario (email, nome, senha) VALUES ('$email', '$nome', '$senha')";


if ($conn->query($sql) === TRUE) {
    $_SESSION['message'] = "Usuário inserido com sucesso.";
    header("Location: index.php");
    exit(0);
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
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
