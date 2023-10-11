CREATE TABLE cliente2
(
   id int PRIMARY KEY auto_increment,
   nome varchar(50),
   cpf char(14) UNIQUE,
   email varchar(50) UNIQUE,
   hash_senha varchar(255)
) ENGINE=InnoDB;

CREATE TABLE clienteEndereco
(
   id int PRIMARY KEY auto_increment,
   cep char(10),
   endereco varchar(100),
   bairro varchar(50),
   cidade varchar(50),
   estado char(2),
   id_cliente int not null,
   FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE CASCADE
) ENGINE=InnoDB;
