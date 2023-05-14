# Sistema de Gerenciamento Escolar - PHP e MySQL

version: 1.0.0

## Tecnologias

1. PHP 8
1. MYSQL 8
1. BOOTSTRAP 5
1. HTML
1. CSS
1. JS

## Participantes

1. CIBELLY DIAS BARRETO
1. VITOR GONCALVES DE AMORIM
1. LORRANT LEVI TAVARES
1. GIOVANNA OLIVEIRA SILVA
1. SANDRO ROCHEL
1. GLAUBER SILVEIRA SANTOS

## Rodando a Aplicação
1. PHP 8 e MySQL 8 Instalados
2. Setup do usuário da aplicação no MySQL
    1. Criar usuário e senha
        > CREATE USER 'escola'@'localhost' IDENTIFIED WITH mysql_native_password BY 'senha-escola';
    2. Dar privilégios ao usuário criado
        > GRANT ALL PRIVILEGES ON \*.\* TO 'escola'@'localhost' WITH GRANT OPTION;

        > FLUSH PRIVILEGES;
    3. Rodar o script escola_db.sql no MySQL para a criação do banco e das tabelas usadas pela aplicação


