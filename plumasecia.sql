CREATE database plumasecia;
USE plumasecia;

CREATE TABLE formulario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    nome VARCHAR(100),
    senha VARCHAR(100)
);

SELECT * FROM formulario;
