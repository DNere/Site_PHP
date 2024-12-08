<?php
    // Verifica se existe uma mensagem armazenada na sessão
    if (isset($_SESSION['message'])) :
?>
        
    <!-- Exibe uma mensagem de alerta estilizada com classes do Bootstrap -->
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <!-- Título fixo do alerta -->
        <strong>Ação realizada!</strong> 
        <!-- Exibe a mensagem armazenada na variável de sessão -->
        <?= $_SESSION['message']; ?>
        <!-- Botão para fechar o alerta -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php 
        
    // Remove a mensagem da sessão após exibi-la
    unset($_SESSION['message']);
    endif;
?>
