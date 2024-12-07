<?php 
session_start();
require_once 'config.php';
include('msg.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];

    $stmt = $conn->prepare("DELETE FROM formulario WHERE email = ?");
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        $_SESSION['message'] = "Usuário excluído com sucesso.";
        header("Location: index.php");
        exit(0);
    } else {
        echo "Erro ao deletar: " . $stmt->error;
    }
    $stmt->close();
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
