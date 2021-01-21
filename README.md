# Sistema de Cadastro PDO

O Projeto é um CRUD feito com PHP Orientado a Objetos, PDO e MySQL. Ele cadastra usuários no Banco de Dados, e se o usuário digitou alguma dado incorreto, ele tem a opção de editar o dado em questão ou deletar. No campo esquerdo é para ele inserir os dados e no canto direito é onde tem os botões de deletar e editar e onde são exibido os dados.

## Como usar o Sistema??

1. Clone este repositório;
2. Vai até o localhost > phpmyadmin;
3. Crie um Banco de Dados chamado CRUDPESSOA;
4. Insira sql o seguinte código: 

~~~~
CREATE DATABASE CRUDPESSOA;

USE CRUDPESSOA;

CREATE TABLE PESSOA(

    id int AUTO_INCREMENT PRIMARY KEY,
    nome varchar(40),
    telefone varchar(15),
    email varchar(50)

);
~~~~

5. Salve o BD.

## Abraço!

