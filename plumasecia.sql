CREATE database plumasecia;
USE plumasecia;

CREATE TABLE formulario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    nome VARCHAR(100),
    senha VARCHAR(100)
);

SELECT * FROM formulario;

INSERT INTO formulario VALUES 
('001','daniel.nere780@gmail.com','Daniel Nere Rodrigues','senhasecreta'),
('002','eduarda.rodrigues@gmail.com','Eduarda Nere Rodrigues','2004'),
('003','a.ghiraldelli@aluno.ifsp.edu.br','Ana Julia Gomes Ghiraldelli','09shd32A638');



SELECT formulario.nome AS 'Usuários', formulario.email AS 'Emails'
	FROM formulario
		ORDER BY formulario.nome;

SELECT formulario.nome AS 'Usuários chamados Daniel'
	FROM formulario
		WHERE nome LIKE '%Daniel%';
        
SELECT formulario.email AS 'Emails'
	FROM formulario
		WHERE email LIKE '%gmail.com%';
