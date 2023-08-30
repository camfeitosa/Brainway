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
nivel INT DEFAULT 1,
pontos INT DEFAULT 0
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


CREATE TABLE avatar (
id_avatar INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR (30),
caminho VARCHAR (100),
valor INT
);

 

INSERT INTO avatar VALUES (1, 'yoda', 'personagens/yoda.png', 20);
INSERT INTO avatar VALUES (2, 'aladin', 'personagens/aladin.png', 10);
INSERT INTO avatar VALUES (3, 'masc1', 'personagens/masc1.png', 0);

 

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

 

CREATE TABLE nota (
id_nota INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_user INT,
titulo VARCHAR (254),
conteudo VARCHAR (254),
data_criacao DATE,
FOREIGN KEY (id_user) REFERENCES usuario (id_user)
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
