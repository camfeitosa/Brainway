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
INSERT INTO avatar VALUES (NULL, 'Aladin', 'personagens/aladin.png', 20);
INSERT INTO avatar VALUES (NULL, 'America', 'personagens/america.png', 20);
INSERT INTO avatar VALUES (NULL, 'Ana', 'personagens/ana.png', 20);
INSERT INTO avatar VALUES (NULL, 'Homem-Aranha', 'personagens/aranha.png', 500);
INSERT INTO avatar VALUES (NULL, 'Ariel', 'personagens/ariel.png', 20);
INSERT INTO avatar VALUES (NULL, 'Aurora', 'personagens/aurora.png', 20);
INSERT INTO avatar VALUES (NULL, 'Barbie', 'personagens/barbie.png', 20);
INSERT INTO avatar VALUES (NULL, 'Bela', 'personagens/bela.png', 20);
INSERT INTO avatar VALUES (NULL, 'Branca', 'personagens/branca.png', 20);
INSERT INTO avatar VALUES (NULL, 'Buzz', 'personagens/buzz.png', 20);
INSERT INTO avatar VALUES (NULL, 'Cartola', 'personagens/cartola.png', 20);
INSERT INTO avatar VALUES (NULL, 'Cheshire', 'personagens/cheshire.png', 20);
INSERT INTO avatar VALUES (NULL, 'Cinderela', 'personagens/cinderela.png', 20);
INSERT INTO avatar VALUES (NULL, 'Coelho', 'personagens/coelho.png', 20);
INSERT INTO avatar VALUES (NULL, 'Copas', 'personagens/copas.png', 20);
INSERT INTO avatar VALUES (NULL, 'Coringa', 'personagens/coringa.png', 20);
INSERT INTO avatar VALUES (NULL, 'Doende', 'personagens/doende.png', 20);
INSERT INTO avatar VALUES (NULL, 'Eric', 'personagens/eric.png', 20);
INSERT INTO avatar VALUES (NULL, 'Homem de Ferro', 'personagens/ferro.png', 20);
INSERT INTO avatar VALUES (NULL, 'Freddy', 'personagens/freddy.png', 20);
INSERT INTO avatar VALUES (NULL, 'Genio', 'personagens/genio.png', 20);
INSERT INTO avatar VALUES (NULL, 'Grinch', 'personagens/grinch.png', 20);
INSERT INTO avatar VALUES (NULL, 'Homer', 'personagens/homer.png', 20);
INSERT INTO avatar VALUES (NULL, 'Jasmine', 'personagens/jasmine.png', 20);
INSERT INTO avatar VALUES (NULL, 'Jigsaw', 'personagens/jigsaw.png', 20);
INSERT INTO avatar VALUES (NULL, 'Ken', 'personagens/ken.png', 20);
INSERT INTO avatar VALUES (NULL, 'Loki', 'personagens/loki.png', 20);
INSERT INTO avatar VALUES (NULL, 'Malevola', 'personagens/malevola.png', 20);
INSERT INTO avatar VALUES (NULL, 'Margot', 'personagens/margot.png', 20);
INSERT INTO avatar VALUES (NULL, 'Merida', 'personagens/merida.png', 20);
INSERT INTO avatar VALUES (NULL, 'Mickey', 'personagens/mickey.png', 20);
INSERT INTO avatar VALUES (NULL, 'Mike', 'personagens/mike.png', 20);
INSERT INTO avatar VALUES (NULL, 'Mulan', 'personagens/mulan.png', 20);
INSERT INTO avatar VALUES (NULL, 'Olaf', 'personagens/olaf.png', 20);
INSERT INTO avatar VALUES (NULL, 'Pocahontas', 'personagens/pocahontas.png', 20);
INSERT INTO avatar VALUES (NULL, 'Rapunzel', 'personagens/rapunzel.png', 20);
INSERT INTO avatar VALUES (NULL, 'Shrek', 'personagens/shrek.png', 20);
INSERT INTO avatar VALUES (NULL, 'Stitch', 'personagens/stitch.png', 20);
INSERT INTO avatar VALUES (NULL, 'Sullivan', 'personagens/sullivan.png', 20);
INSERT INTO avatar VALUES (NULL, 'Tiana', 'personagens/tiana.png', 20);
INSERT INTO avatar VALUES (NULL, 'Tritão', 'personagens/tritao.png', 20);
INSERT INTO avatar VALUES (NULL, 'Ursola', 'personagens/ursola.png', 20);
INSERT INTO avatar VALUES (NULL, 'Woody', 'personagens/woody.png', 20);
INSERT INTO avatar VALUES (NULL, 'Yoda', 'personagens/yoda.png', 20);
 
/*PERSONAGENS INICIAIS */
 
INSERT INTO avatar VALUES (NULL, 'Masculino 1', 'personagens/m1.png', 0);
INSERT INTO avatar VALUES (NULL, 'Masculino 2', 'personagens/m2.png', 0);
INSERT INTO avatar VALUES (NULL, 'Masculino 3', 'personagens/m3.png', 0);
INSERT INTO avatar VALUES (NULL, 'Masculino 4', 'personagens/m4.png', 0);
INSERT INTO avatar VALUES (NULL, 'Masculino 5', 'personagens/m5.png', 0);
 
INSERT INTO avatar VALUES (NULL, 'Feminino 1', 'personagens/f1.png', 0);
INSERT INTO avatar VALUES (NULL, 'Feminino 2', 'personagens/f2.png', 0);
INSERT INTO avatar VALUES (NULL, 'Feminino 3', 'personagens/f3.png', 0);
INSERT INTO avatar VALUES (NULL, 'Feminino 4', 'personagens/f4.png', 0);
INSERT INTO avatar VALUES (NULL, 'Feminino 5', 'personagens/f5.png', 0);
 
 
INSERT INTO avatar VALUES (NULL, 'Não Binário 1', 'personagens/nb1.png', 0);
INSERT INTO avatar VALUES (NULL, 'Não Binário 2', 'personagens/nb2.png', 0);
INSERT INTO avatar VALUES (NULL, 'Não Binário 3', 'personagens/nb3.png', 0);
INSERT INTO avatar VALUES (NULL, 'Não Binário 4', 'personagens/nb4.png', 0);
INSERT INTO avatar VALUES (NULL, 'Não Binário 5', 'personagens/nb5.png', 0);
 
CREATE TABLE compra (
id_compra INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_user INT,
id_avatar INT,
caminho VARCHAR (100),
 
FOREIGN KEY (id_user) REFERENCES usuario (id_user),
FOREIGN KEY (id_avatar) REFERENCES avatar (id_avatar)
);
 
 
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