CREATE DATABASE CRUDPESSOA;

USE CRUDPESSOA;

CREATE TABLE PESSOA(

    id int AUTO_INCREMENT PRIMARY KEY,
    nome varchar(40),
    telefone varchar(15),
    email varchar(50)

);