<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Vamos usar o BootStrap para pegar alguns estilos prontos? -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inserindo gente!</title>
</head>
<body>
<!-- Essas classes do CSS são todas do bootstrap!-->
<div class="container mt-5">
        <!-- O bootstrap organiza o layout em linhas (row) e colunas (col)-->
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar pessoa
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Vamos omitir o  action porque queremos que o formulário chame ele mesmo!-->
                        <form method="POST">
                            <div class="mb-3">
                                <label>Prontuario</label>
                                <input type="text" name="prontuario" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="salvar_pessoa" class="btn btn-primary">Salvar pessoa</button>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>