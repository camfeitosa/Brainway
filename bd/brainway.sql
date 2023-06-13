DROP DATABASE IF EXISTS brainway;
CREATE DATABASE brainway;
USE brainway;

 

CREATE TABLE usuario (
id_user INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
usuario VARCHAR (254) UNIQUE,
nome VARCHAR (254),
email VARCHAR (254) UNIQUE,
senha VARCHAR (254),
data_cad DATE,
recompensa_t INT,
img_perfil VARCHAR (254)
);

 

CREATE TABLE lista (
id_lista INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_user INT,
titulo VARCHAR (254),
data_criacao DATE,
FOREIGN KEY (id_user) REFERENCES usuario (id_user)
-- FOREIGN KEY (id_item) REFERENCES ToDoList (id_item)
);

 


CREATE TABLE item_lista (
id_item INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_lista INT,
item VARCHAR (254),
data_conclusao DATE,
prioridade VARCHAR (254),
descricao VARCHAR (254),
status_item VARCHAR (50),
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
dias DATE,
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

 