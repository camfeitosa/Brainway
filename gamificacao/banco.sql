DROP DATABASE IF EXISTS gamificacao;
CREATE DATABASE gamificacao;
USE gamificacao;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
	nivel INT DEFAULT 1,
    pontos INT DEFAULT 0
);

INSERT INTO usuarios (id, nome, pontos) VALUES (1, 'Camila', DEFAULT);


SELECT * FROM usuarios;
