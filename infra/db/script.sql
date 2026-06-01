CREATE DATABASE sistema_simpless;

USE sistema_simpless;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

INSERT INTO usuario (usuario, senha) VALUE ('admin', '123');


--Esta página serve para criar o banco de dados e criar uma tabela de usuário e inserir um  usúario a está tabela no banco de dados.