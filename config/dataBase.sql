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
pontos INT DEFAULT 0,
num_logins INT DEFAULT 0,
nivel INT DEFAULT 0
);

CREATE TABLE task (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_user INT,
	description VARCHAR(50) NOT NULL,
	completed BOOLEAN DEFAULT FALSE,
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
FOREIGN KEY (id_user) REFERENCES usuario (id_user),
FOREIGN KEY (id_avatar) REFERENCES avatar (id_avatar)
);

 INSERT INTO avatar VALUES (NULL, 'Masculino', 'personagens/m1.png', 0);
INSERT INTO avatar VALUES (NULL, 'Masculino', 'personagens/m1.png', 0);
INSERT INTO avatar VALUES (NULL, 'Masculino', 'personagens/m2.png', 0);
INSERT INTO avatar VALUES (NULL, 'Masculino', 'personagens/m3.png', 0);
INSERT INTO avatar VALUES (NULL, 'Masculino', 'personagens/m4.png', 0);
INSERT INTO avatar VALUES (NULL, 'Masculino', 'personagens/m5.png', 0);
INSERT INTO avatar VALUES (NULL, 'Feminino', 'personagens/f1.png', 0);
INSERT INTO avatar VALUES (NULL, 'Feminino', 'personagens/f2.png', 0);
INSERT INTO avatar VALUES (NULL, 'Feminino', 'personagens/f3.png', 0);
INSERT INTO avatar VALUES (NULL, 'Feminino', 'personagens/f4.png', 0);
INSERT INTO avatar VALUES (NULL, 'Feminino', 'personagens/f5.png', 0);
INSERT INTO avatar VALUES (NULL, 'Aladin', 'personagens/aladdin.png', 200);
INSERT INTO avatar VALUES (NULL, 'Alice', 'personagens/alice.png', 100);
INSERT INTO avatar VALUES (NULL, 'America', 'personagens/america.png', 20);
INSERT INTO avatar VALUES (NULL, 'Ana', 'personagens/ana.png', 20);
INSERT INTO avatar VALUES (NULL, 'Homem-Aranha', 'personagens/aranha.png', 500);
INSERT INTO avatar VALUES (NULL, 'Ariel', 'personagens/ariel.png', 200);
INSERT INTO avatar VALUES (NULL, 'Aurora', 'personagens/aurora.png', 200);
INSERT INTO avatar VALUES (NULL, 'Barbie', 'personagens/barbie.png', 500);
INSERT INTO avatar VALUES (NULL, 'Bela', 'personagens/bela.png', 200);
INSERT INTO avatar VALUES (NULL, 'Branca', 'personagens/branca.png', 200);
INSERT INTO avatar VALUES (NULL, 'Buzz', 'personagens/buzz.png', 500);
INSERT INTO avatar VALUES (NULL, 'Cartola', 'personagens/cartola.png', 20);
INSERT INTO avatar VALUES (NULL, 'Cheshire', 'personagens/cheshire.png', 20);
INSERT INTO avatar VALUES (NULL, 'Cinderela', 'personagens/cinderela.png', 200);
INSERT INTO avatar VALUES (NULL, 'Coelho', 'personagens/coelho.png', 20);
INSERT INTO avatar VALUES (NULL, 'Copas', 'personagens/copas.png', 20);
INSERT INTO avatar VALUES (NULL, 'Coringa', 'personagens/coringa.png', 500);
INSERT INTO avatar VALUES (NULL, 'Doende', 'personagens/doende.png', 20);
INSERT INTO avatar VALUES (NULL, 'Eric', 'personagens/eric.png', 20);
INSERT INTO avatar VALUES (NULL, 'Homem de Ferro', 'personagens/ferro.png', 20);
INSERT INTO avatar VALUES (NULL, 'Freddy', 'personagens/freddy.png', 400);
INSERT INTO avatar VALUES (NULL, 'Genio', 'personagens/genio.png', 20);
INSERT INTO avatar VALUES (NULL, 'Grinch', 'personagens/grinch.png', 20);
INSERT INTO avatar VALUES (NULL, 'Homer', 'personagens/homer.png', 20);
INSERT INTO avatar VALUES (NULL, 'Jasmine', 'personagens/jasmine.png', 200);
INSERT INTO avatar VALUES (NULL, 'Jigsaw', 'personagens/jigsaw.png', 200);
INSERT INTO avatar VALUES (NULL, 'Ken', 'personagens/ken.png', 20);
INSERT INTO avatar VALUES (NULL, 'Loki', 'personagens/loki.png', 400);
INSERT INTO avatar VALUES (NULL, 'Malevola', 'personagens/malevola.png', 200);
INSERT INTO avatar VALUES (NULL, 'Margot', 'personagens/margot.png', 20);
INSERT INTO avatar VALUES (NULL, 'Merida', 'personagens/merida.png', 200);
INSERT INTO avatar VALUES (NULL, 'Mickey', 'personagens/mickey.png', 20);
INSERT INTO avatar VALUES (NULL, 'Mike', 'personagens/mike.png', 200);
INSERT INTO avatar VALUES (NULL, 'Mulan', 'personagens/mulan.png', 200);
INSERT INTO avatar VALUES (NULL, 'Olaf', 'personagens/olaf.png', 200);
INSERT INTO avatar VALUES (NULL, 'Pocahontas', 'personagens/pocahontas.png', 200);
INSERT INTO avatar VALUES (NULL, 'Rapunzel', 'personagens/rapunzel.png', 200);
INSERT INTO avatar VALUES (NULL, 'Shrek', 'personagens/shrek.png', 500);
INSERT INTO avatar VALUES (NULL, 'Stitch', 'personagens/stitch.png', 300);
INSERT INTO avatar VALUES (NULL, 'Sullivan', 'personagens/sullivan.png', 200);
INSERT INTO avatar VALUES (NULL, 'Tiana', 'personagens/tiana.png', 200);
INSERT INTO avatar VALUES (NULL, 'Tritão', 'personagens/tritao.png', 20);
INSERT INTO avatar VALUES (NULL, 'Ursola', 'personagens/ursola.png', 20);
INSERT INTO avatar VALUES (NULL, 'Woody', 'personagens/woody.png', 500);
INSERT INTO avatar VALUES (NULL, 'Yoda', 'personagens/yoda.png', 300);
 


CREATE TABLE nota (
id_nota INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_user INT,
titulo VARCHAR (254),
conteudo VARCHAR (254),
data_criacao DATE,
FOREIGN KEY (id_user) REFERENCES usuario (id_user)
);


CREATE TABLE pomodoro (
id_pomodoro INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_user INT,
inicio DATETIME,
fim DATETIME,
FOREIGN KEY (id_user) REFERENCES usuario (id_user)
);

CREATE TABLE cronograma (
  id_evento int(11) NOT NULL AUTO_INCREMENT,
  fk_id_user int(11) DEFAULT NULL,
  titulo varchar(255) NOT NULL,
  descricao varchar(255) NOT NULL,
  cor varchar(7) DEFAULT NULL,
  inicio datetime NOT NULL,
  termino datetime DEFAULT NULL,
  PRIMARY KEY (id_evento),
  KEY fk_id_user (fk_id_user),
  CONSTRAINT eventos_ibfk_1 FOREIGN KEY (fk_id_user) REFERENCES usuario (id_user)
);







