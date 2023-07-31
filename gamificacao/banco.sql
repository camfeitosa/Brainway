DROP DATABASE IF EXISTS gamificacao;
CREATE DATABASE gamificacao;
USE gamificacao;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    pontos INT DEFAULT 0
);
