-- Modelo de Banco de Dados usado
CREATE DATABASE "Nome do banco de dados";

CREATE TABLE usuario(
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NULL UNIQUE,
    senha VARCHAR(255) NULL
)