<?php
session_start();
require_once 'config.php';
include('msg.php');
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Usuários</title>
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detalhes dos Usuários
                        <a href="create.php" class="btn btn-primary float-end">Adicionar Usuário</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Nome</th>
                                <th>Senha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = "SELECT * FROM formulario";
                                $query_run = mysqli_query($conn, $query);
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $gente)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $gente['email']; ?></td>
                                            <td><?= $gente['nome']; ?></td>
                                            <td><?= $gente['senha']; ?></td>
                                            <td>
                                                <a href="update.php?email=<?= $gente['email']; ?>&nome=<?= $gente['nome']; ?>&senha=<?= $gente['senha']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                <a href="delete.php?email=<?= $gente['email']; ?>&nome=<?= $gente['nome']; ?>&senha=<?= $gente['senha']; ?>" class="btn btn-success btn-sm">Deletar</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "<h5> Nenhum usuário cadastrado... </h5>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
