<?php

include_once('Usuario.php');
final class Database {

    private static $conexao;

    private function __construct() {}

    public static function getInstance(): PDO {
        if (is_null(self::$conexao)) {  
            $dsn = 'mysql:host=localhost;charset=utf8';
            $usuario = 'root';
            $senha = '';
            $opcoes = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_CASE => PDO::CASE_LOWER);

            try {
                self::$conexao = new PDO($dsn, $usuario, $senha, $opcoes);
                self::$conexao->exec("CREATE DATABASE IF NOT EXISTS podcast");
            } catch (\Throwable $th) {
                echo $th;
            }

            $dsn = 'mysql:host=localhost;dbname=podcast;charset=utf8';

            try {
                self::$conexao = new PDO($dsn, $usuario, $senha, $opcoes);
            } catch (\Throwable $th) {
                echo $th;
            }
        }
        
        return self::$conexao;
    }

    public static function createSchema(): void {
        $db = self::getInstance();
        $db->exec("CREATE TABLE IF NOT EXISTS usuarios (
            id INT NOT NULL AUTO_INCREMENT,
            nome_usuario VARCHAR(60) NOT NULL,
            nome_canal VARCHAR(45) NOT NULL,
            data_nasc DATE NOT NULL,
            descricao VARCHAR(200) NOT NULL,
            genero VARCHAR(20) NOT NULL,
            email VARCHAR(45) NOT NULL,
            senha VARCHAR(150) NOT NULL,
            classificacao VARCHAR(45) NOT NULL,
            data_inscricao DATE NOT NULL,
            PRIMARY KEY (id),
            UNIQUE INDEX email_UNIQUE (email ASC));");
    }
}