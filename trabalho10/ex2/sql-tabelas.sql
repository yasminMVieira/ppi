CREATE TABLE Contato
(
   id int PRIMARY KEY auto_increment,
   nome varchar(50),
   email varchar(50) UNIQUE,
   mensagem varchar(255)
) ENGINE=InnoDB;
