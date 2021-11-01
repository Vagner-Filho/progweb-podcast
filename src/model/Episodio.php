<?php
include 'src/model/Usuario.php';
use Usuario;

/**
 * Classe responsável por reprensentar os dados de um episódio de podcast
 */
class Episodio{ 
	private $titulo;
	private $descricao;
	private $canal;
	private $arquivoAudio;
	private $foto;

	function __construct(string $titulo, string $descricao)
	{
		$this->titulo = $titulo;
		$this->descricao = $descricao;
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

	public function salvar(){
		Database::createSchema();
        $conexao = Database::getInstance();
		
		$stm = $conexao->prepare('insert into episodios(titulo, descricao, canal) values (:titulo, :descricao, :canal)');

		$stm->bindParam(':titulo', $this->titulo);
		$stm->bindParam(':descricao', $this->descricao);
		$stm->bindParam(':canal', 1);

		$stm->execute();
	}
}
?>