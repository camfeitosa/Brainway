DROP DATABASE if exists brainway;
CREATE DATABASE brainway;
USE brainway;
 
CREATE TABLE usuario (
id_user INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
usuario VARCHAR (30) UNIQUE,
nome VARCHAR (100),
email VARCHAR (100) UNIQUE,
senha VARCHAR (100),
data_cad DATE,
moedas INT,
avatar VARCHAR (100),
nivel INT
);
 
 
CREATE TABLE avatar (
id_avatar INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR (30),
caminho VARCHAR (100),
valor INT
);
 
CREATE TABLE compra (
id_compra INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_user INT,
id_avatar INT,
caminho VARCHAR (100),
 
FOREIGN KEY (id_user) REFERENCES usuario (id_user),
FOREIGN KEY (id_avatar) REFERENCES avatar (id_avatar)
);
 
 
INSERT INTO avatar VALUES (6, 'yoda', 'pages/loja/personagens/yoda.png', 20);


INSERT INTO avatar VALUES (2, 'aladin', 'personagens/aladin.png', 10);
INSERT INTO avatar VALUES (3, 'masc1', 'personagens/masc1.png', 0);

INSERT INTO avatar VALUES (7, 'ana', 'personagens/ana.png', 20);
INSERT INTO avatar VALUES (8, 'woody', 'personagens/woody.png', 0);
INSERT INTO avatar VALUES (9, 'ariel', 'personagens/ariel.png', 10);
INSERT INTO avatar VALUES (11, 'america', 'personagens/america.png', 0);

 
/*
CREATE TABLE compra (
id_compra INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
id_user INT,
id_avatar INT, 
FOREIGN KEY (id_user) REFERENCES usuario (id_user),
FOREIGN KEY (id_avatar) REFERENCES avatar (id_avatar)
);
 
*/
CREATE TABLE lista (
id_lista INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_user INT,
titulo VARCHAR (254),
data_criacao DATE,
FOREIGN KEY (id_user) REFERENCES usuario (id_user)
);
 
CREATE TABLE item_lista (
id_item INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_lista INT,
item VARCHAR (254),
data_conclusao DATE,
prioridade VARCHAR (20),
descricao VARCHAR (254),
status_item VARCHAR (20),
FOREIGN KEY (id_lista) REFERENCES lista (id_lista)
);

CREATE TABLE cores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    codigo_cor VARCHAR(7) NOT NULL
);
INSERT INTO cores (nome, codigo_cor) VALUES
    ('Cor1', '#D6F3ED'),
    ('Cor2', '#DFF1FC'),
    ('Cor3', '#DFF3E8'),
    ('Cor4', '#EDE6F9'),
    ('Cor5', '#F7DDDD'),
    ('Cor6', '#FAF6CC'),
    ('Cor7', '#FBEAD3'),
    ('Cor8', '#FFE2F0');

CREATE TABLE nota (
id_nota INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_user INT,
id_cor INT,
titulo VARCHAR (254),
conteudo VARCHAR (254),
data_criacao DATE,
FOREIGN KEY (id_user) REFERENCES usuario (id_user),
FOREIGN KEY (id_cor) REFERENCES cores (id)
);
 
CREATE TABLE rotina (
id_user INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
tarefa VARCHAR (254),
dia DATE,
horario TIME,
FOREIGN KEY (id_user) REFERENCES usuario (id_user)
);
 
CREATE TABLE pomodoro (
id_pomodoro INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_user INT,
inicio DATETIME,
fim DATETIME,
FOREIGN KEY (id_user) REFERENCES usuario (id_user)
);

CREATE TABLE quiz (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pergunta TEXT NOT NULL,
    alternativa1 VARCHAR(100) NOT NULL,
    alternativa2 VARCHAR(100) NOT NULL,
    alternativa3 VARCHAR(100) NOT NULL,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES usuario(id_user)
);