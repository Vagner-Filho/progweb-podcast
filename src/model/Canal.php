<?php
/**
* Essa classe contem os dados de um usuario, e é guardado no BD.
*/
class Canal {
	private $id;
	private $nomeCanal;
	private $descricao;
    private $generos = array();
	private $classificacao;
	private $fotoCanal;
	private $criador;

	function __construct(string $nomeCanal, string $descricao, array $generos, string $classificacao, string $fotoCanal, Usuario $criador)
	{
		$this->nomeCanal = $nomeCanal;
        $this->descricao = $descricao;
        $this->generos = $generos;
        $this->classificacao = $classificacao;
        $this->fotoCanal = $fotoCanal;
		$this->criador = $criador;
	}

	/**
    * Essa função retorna o atributo $campo, que não sei para que serve
    */
    public function __get($campo) 
    {
        return $this->$campo;
    }

    /**
    * Essa função cria o atributo $campo e adiciona a ele o parametro $valor
    */
    public function __set($campo, $valor) 
    {
        return $this->$campo = $valor;
    }

	/**
	 * Função que salva um canal no banco de dados
	 */
	public function salvar()
	{
		Database::createSchema();
        $conexao = Database::getInstance();

        $stm = $conexao->prepare('insert into canais (nome_canal, descricao, classificacao, foto, idUsuario) 
        values 
        (:nome_canal, :descricao, :classificacao, :foto, :idUsuario)');

        $stm->bindParam(':nome_canal', $this->nomeCanal);
        $stm->bindParam(':descricao', $this->descricao);
        $stm->bindParam(':classificacao', $this->classificacao);
        $stm->bindParam(':foto', $this->foto);
        $stm->bindParam(':idUsuario',$this->criador->__get('id'));
        $stm->execute();
	}

	/**
	 * Função que busca todos os canais do BD
	 */
	public static function getAll()
	{
		Database::createSchema();
        $conexao = Database::getInstance();

        $stm = $conexao->prepare("SELECT * FROM canais, usuarios, generos WHERE canais.idUsuario = usuarios.idUsuario");
        $canais = array();

        $stm->execute();
        $resultados = $stm->fetchAll(PDO::FETCH_ASSOC);

		foreach ($resultados as $resultado) {

			$dataNasc = new DateTime($resultado['data_nasc'], new DateTimezone("America/Campo_Grande"));
            $dataInscricao = new DateTime($resultado['data_inscricao'], new DateTimezone("America/Campo_Grande"));

			$generos = Canal::buscarGeneros($resultado['idCanal']);

            $usuario = new Usuario ($resultado['nome_usuario'], $dataNasc, $resultado['email'], $resultado['senha'], $dataInscricao, $resultado['foto_perfil']);
			$usuario->id = $resultado['id'];
			$usuario->senha = $resultado['senha'];

			$canal = new Canal($resultado['nome_canal'], $resultado['descricao'], $generos, $resultado['classificacao'], $resultado['foto'], $usuario);

            array_push($canais, $canal);
		}
		return $canais;
	}

	/**
	 * Função que salva os generos do canal na tabela generos
	 */
    public function salvarGeneros()
    {
        Database::createGeneros();
        $conexao = Database::getInstance();

        foreach ($this->generos as $genero) {
            $stm = $conexao->prepare('insert into generos values (:idCanal, :genero)');

            $stm->bindParam(':idCanal', $this->criador->__get("id"));
            $stm->bindParam(':genero', $genero);

            $stm->execute();
        }
    }

    /**
	 * Função que busca os generos do usuario, e retorna um array com eles
	 */
	static public function buscarGeneros($idCanal) {
		Database::createFavoritos();
        $conexao = Database::getInstance();
        $generos = array();

		$stm = $conexao->prepare('select genero from generos where idCanal = :idCanal');
        $stm->bindParam(':idCanal', $idCanal);

        $stm->execute();
        $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

		foreach ($resultado as $value) {

			array_push($generos, $value['genero']);
		}

		return $generos;
	}

	public static function getGeneros(){
		Database::createFavoritos();
        $conexao = Database::getInstance();
        $generos = array();

		$stm = $conexao->query('select * from generos');
    
        $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);

		foreach ($resultado as $value) {

			array_push($generos, $value['genero']);
		}

		return $generos;
	}
    

}