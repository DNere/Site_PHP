<?php
$servername = "localhost";
$username = "root";
$password = "0000"; 
$dbname = "plumasecia";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Se a conexão falhar, exibe erro e termina o script
}
// A conexão foi bem-sucedida, mas não imprima diretamente nada se não for necessário
?>
