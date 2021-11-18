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
            email VARCHAR(45) NOT NULL,
            senha VARCHAR(150) NOT NULL,
            classificacao VARCHAR(45) NOT NULL,
            data_inscricao DATE NOT NULL,
            foto_perfil VARCHAR(150),
            foto_canal VARCHAR(150),
            PRIMARY KEY (id),
            UNIQUE INDEX email_UNIQUE (email ASC));");

		$db->exec("CREATE TABLE IF NOT EXISTS episodios(
			id INTEGER NOT NULL AUTO_INCREMENT,
			titulo VARCHAR(100) NOT NULL,
			descricao VARCHAR(200) NOT NULL,
			canal INTEGER,
			arquivoAudio VARCHAR(150),
			foto VARCHAR(150),
			PRIMARY KEY (id)
		);");

        $db->exec("CREATE TABLE IF NOT EXISTS generos(
            email VARCHAR(45) NOT NULL,
            genero VARCHAR(20) NOT NULL,
            PRIMARY KEY (email, genero),
            FOREIGN KEY (email) REFERENCES usuarios(email) ON DELETE CASCADE);");
    }

    public static function createFavoritos(): void {
        $db = self::getInstance();

        $db->exec("CREATE TABLE IF NOT EXISTS favoritos (
            usuario_id INT NOT NULL,
            episodio_id INT NOT NULL,
            PRIMARY KEY (usuario_id, episodio_id),
            FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
            FOREIGN KEY (episodio_id) REFERENCES episodios(id) ON DELETE CASCADE);");
            
    }
}
//FOREIGN KEY (canal) REFERENCES usuarios(id)