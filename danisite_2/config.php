<?php

// Define as variáveis necessárias para a conexão com o banco de dados
$servername = "localhost"; // Endereço do servidor onde o banco de dados está hospedado (geralmente "localhost" em ambiente local)
$username = "root";        // Nome de usuário do banco de dados
$password = "0000";        // Senha do usuário do banco de dados
$dbname = "plumasecia";    // Nome do banco de dados ao qual deseja se conectar

// Cria uma nova conexão com o banco de dados usando a classe mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve um erro na conexão
if ($conn->connect_error) {
    // Em caso de erro, exibe uma mensagem e encerra o script
    die("Connection failed: " . $conn->connect_error);
}

?>
