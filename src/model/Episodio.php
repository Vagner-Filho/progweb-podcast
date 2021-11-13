<?php

/**
 * Classe responsável por reprensentar os dados de um episódio de podcast
 */
class Episodio{ 
	private $titulo;
	private $descricao;
	private $canal;
	private $arquivoAudio;
	private $foto;

	function __construct(string $titulo, string $descricao, Usuario $canal, string $arquivoAudio,string $foto)
	{
		$this->titulo = $titulo;
		$this->descricao = $descricao;
		$this->canal = $canal;
		$this->arquivoAudio = $arquivoAudio;
		$this->foto = $foto;
	}

	/**
    * Função get que retorna o valor do campo passado por parâmetro
    */
    public function __get($campo) 
    {
        return $this->$campo;
    }

    /**
    * Função set que atribui o valor do parâmetro $valor ao atributo passado em $campo
    */
    public function __set($campo, $valor) 
    {
        return $this->$campo = $valor;
    }

	/**
	 * Função que retorna todos os episodios do canal cujo id é passado por parâmetro
	 */
	static public function getEpisodios($idCanal){
		Database::createSchema();
        $conexao = Database::getInstance();
		$episodios = array();

		$stm = $conexao->prepare('select * from episodios where canal = :canal');
		$stm->bindParam(':canal', $idCanal);
		$stm->execute();
		$resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultado as $value) {
			//var_dump($value);
			
			$canal = Usuario::buscarUsuarioPorId($value['canal']);

			$episodio = new Episodio($value['titulo'], $value['descricao'], $canal, $value['arquivoaudio'], $value['foto']);
			
			array_push($episodios, $episodio);
		}
		return $episodios;
	}
 
	/**
	 * Função que salvar um episódio no banco de dados
	 */
	public function salvar(){
		Database::createSchema();
        $conexao = Database::getInstance();
		
		$stm = $conexao->prepare('insert into episodios(titulo, descricao, canal, arquivoAudio, foto) values (:titulo, :descricao, :canal, :arquivoAudio, :foto)');

		$stm->bindParam(':titulo', $this->titulo);
		$stm->bindParam(':descricao', $this->descricao);
		$stm->bindParam(':canal', $this->canal->id);
		$stm->bindParam(':arquivoAudio', $this->arquivoAudio);
		$stm->bindParam(':foto', $this->foto);
		$stm->execute();
	}
}
?>