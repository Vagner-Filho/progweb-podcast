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

        

        $stm = $db->prepare('SELECT * FROM Usuarios WHERE nome_canal = "Canal de Esportes" or nome_canal = "Canal de Musica" or 
        nome_canal = "Canal de Jogos"');
        $stm->execute();
        $resultado = $stm->fetch();

        if (!$resultado) {
            $stm = $db->prepare('insert into usuarios (id, nome_usuario, nome_canal, data_nasc, descricao, email, senha, classificacao, data_inscricao, foto_perfil, foto_canal) 
            values 
            (:id, :nome_usuario, :nome_canal, :dataNasc, :descricao, :email, :senha, :classificacao, :dataInscricao, :foto_perfil, :foto_canal)');

            $stm->bindValue(':id', '14');
            $stm->bindValue(':nome_usuario', 'Usuario do Esporte');
            $stm->bindValue(':nome_canal', 'Canal de Esportes');
            $stm->bindValue(':dataNasc', '2021-11-17');
            $stm->bindValue(':descricao', 'Esse canal é só sobre Esportes');
            $stm->bindValue(':email', 'esportes@esportes');
            $stm->bindValue(':senha', '12345');
            $stm->bindValue(':classificacao', 'Livre');
            $stm->bindValue(':dataInscricao', '2021-11-19');
            $stm->bindValue(':foto_perfil', 'blank-profile-picture-973460__480.png');
            $stm->bindValue(':foto_canal', 'fotoCanalEsporte.jpg');
            $stm->execute();


            $stm = $db->exec('insert into generos(email, genero) values ("esportes@esportes", "Esporte")');


            $stm = $db->prepare('insert into episodios(titulo, descricao, canal, arquivoAudio, foto) values (:titulo, :descricao, :canal, :arquivoAudio, :foto)');

            $stm->bindValue(':titulo', 'Futebol');
            $stm->bindValue(':descricao', 'Esse episódio é só sobre Futebol');
            $stm->bindValue(':canal', '14');
            $stm->bindValue(':arquivoAudio', 'yt1s.com - Regras básicas  Futebol.mp3');
            $stm->bindValue(':foto', 'episodioFutebol.jpg');
            $stm->execute();

            $stm = $db->prepare('insert into episodios(titulo, descricao, canal, arquivoAudio, foto) values (:titulo, :descricao, :canal, :arquivoAudio, :foto)');

            $stm->bindValue(':titulo', 'Volei');
            $stm->bindValue(':descricao', 'Esse episódio é só sobre Volei');
            $stm->bindValue(':canal', '14');
            $stm->bindValue(':arquivoAudio', 'yt1s.com - As regras do vôlei  Vôlei.mp3');
            $stm->bindValue(':foto', 'episodioVolei.jpg');
            $stm->execute();

            $stm = $db->prepare('insert into episodios(titulo, descricao, canal, arquivoAudio, foto) values (:titulo, :descricao, :canal, :arquivoAudio, :foto)');

            $stm->bindValue(':titulo', 'Natacao');
            $stm->bindValue(':descricao', 'Esse episódio é só sobre Natacao');
            $stm->bindValue(':canal', '14');
            $stm->bindValue(':arquivoAudio', 'yt1s.com - Crawl  método básico  Natação.mp3');
            $stm->bindValue(':foto', 'episodioNatacao.jpg');
            $stm->execute();
        
        


        
            $stm = $db->prepare('insert into usuarios (id, nome_usuario, nome_canal, data_nasc, descricao, email, senha, classificacao, data_inscricao, foto_perfil, foto_canal) 
            values 
            (:id, :nome_usuario, :nome_canal, :dataNasc, :descricao, :email, :senha, :classificacao, :dataInscricao, :foto_perfil, :foto_canal)');

            $stm->bindValue(':id', '15');
            $stm->bindValue(':nome_usuario', 'Usuario da Musica');
            $stm->bindValue(':nome_canal', 'Canal de Musica');
            $stm->bindValue(':dataNasc', '2021-11-17');
            $stm->bindValue(':descricao', 'Esse canal é só sobre Musica');
            $stm->bindValue(':email', 'musica@musica');
            $stm->bindValue(':senha', '12345');
            $stm->bindValue(':classificacao', 'Livre');
            $stm->bindValue(':dataInscricao', '2021-11-19');
            $stm->bindValue(':foto_perfil', 'blank-profile-picture-973460__480.png');
            $stm->bindValue(':foto_canal', 'fotoCanalMusica.jpg');
            $stm->execute();


            $stm = $db->exec('insert into generos(email, genero) values ("musica@musica", "Musica")');



            $stm = $db->prepare('insert into episodios(titulo, descricao, canal, arquivoAudio, foto) values (:titulo, :descricao, :canal, :arquivoAudio, :foto)');

            $stm->bindValue(':titulo', 'Piano');
            $stm->bindValue(':descricao', 'Esse episódio é só sobre Piano');
            $stm->bindValue(':canal', '15');
            $stm->bindValue(':arquivoAudio', 'yt1s.com - Enquanto a noiva não chega noivo toca temas de filmes  Atraso da Noiva.mp3');
            $stm->bindValue(':foto', 'episodioPiano.jpg');
            $stm->execute();

            $stm = $db->prepare('insert into episodios(titulo, descricao, canal, arquivoAudio, foto) values (:titulo, :descricao, :canal, :arquivoAudio, :foto)');

            $stm->bindValue(':titulo', 'Bateria');
            $stm->bindValue(':descricao', 'Esse episódio é só sobre Bateria');
            $stm->bindValue(':canal', '15');
            $stm->bindValue(':arquivoAudio', 'yt1s.com - Whiplash Ending  Andrew Neimans Amazing Drum Solo  Best Movie Ending Ever.mp3');
            $stm->bindValue(':foto', 'episodioBateria.jpg');
            $stm->execute();

            $stm = $db->prepare('insert into episodios(titulo, descricao, canal, arquivoAudio, foto) values (:titulo, :descricao, :canal, :arquivoAudio, :foto)');

            $stm->bindValue(':titulo', 'Guitarra');
            $stm->bindValue(':descricao', 'Esse episódio é só sobre Guitarra');
            $stm->bindValue(':canal', '15');
            $stm->bindValue(':arquivoAudio', 'yt1s.com - Sweet Child o Mine  Guns n Roses  Guitar Cover Guitarrista Ozielzinho.mp3');
            $stm->bindValue(':foto', 'episodioGuitarra.jpg');
            $stm->execute();
        
        
        }
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

    public static function createGeneros(): void {
        $db = self::getInstance();

        $db->exec("CREATE TABLE IF NOT EXISTS generos(
            email VARCHAR(45) NOT NULL,
            genero VARCHAR(20) NOT NULL,
            PRIMARY KEY (email, genero),
            FOREIGN KEY (email) REFERENCES usuarios(email) ON DELETE CASCADE);");
    }

    public static function createCanaisSeguidos(): void {
        $db = self::getInstance();

        $db->exec("CREATE TABLE IF NOT EXISTS canais_seguidos(
            usuario_seguidor_id INT NOT NULL,
            canal_seguido_id INT NOT NULL,
            FOREIGN KEY (usuario_seguidor_id) REFERENCES usuarios(id) ON DELETE CASCADE,
            FOREIGN KEY (canal_seguido_id) REFERENCES usuarios(id) ON DELETE CASCADE);");
    }

    public static function createPesquisa(): void {
        $db = self::getInstance();

		$db->exec("CREATE OR REPLACE TABLE pesquisa(
            id INT NOT NULL,
			titulo VARCHAR(100) NOT NULL
		);");
    }

}
//FOREIGN KEY (canal) REFERENCES usuarios(id)