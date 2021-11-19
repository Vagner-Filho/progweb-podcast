<?php

/**
* Essa classe contem os dados de um usuario, e é guardado no BD.
*/
class Usuario {
	private $id;
    private $nomeUsuario;
    private $dataNasc;
    private $email;
    private $senha;
    private $dataInscricao;
    private $fotoPerfil;

    function __construct(string $nomeUsuario, DateTime $dataNasc,
        string $email, string $senha, DateTime $dataInscricao, string $fotoPerfil) 
    {	
        $this->nomeUsuario = $nomeUsuario;
        $this->dataNasc = $dataNasc;
        $this->email = $email;
        $this->senha = hash('sha256', $senha);
        $this->dataInscricao = $dataInscricao;
        $this->fotoPerfil = $fotoPerfil;
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
    * Essa função apenas verifica se as variaveis passadas por parametro são equivalentes
    * aos seus respectivos atributos dessa classe
    */
    public function igual(string $email, string $senha) 
    {
        return $this->email === $email && $this->senha === hash('sha256', $senha);
    }

    
	/**
	 * Função que busca todos os usuarios do BD
	 */
    static public function getAll()
    {	
		Database::createSchema();
        $conexao = Database::getInstance();

        $stm = $conexao->prepare('SELECT * FROM Usuarios');
        $usuarios = array();

        $stm->execute();
        $resultados = $stm->fetchAll(PDO::FETCH_ASSOC);

		foreach ($resultados as $resultado) {

            $dataNasc = new DateTime($resultado['data_nasc'], new DateTimezone("America/Campo_Grande"));
            $dataInscricao = new DateTime($resultado['data_inscricao'], new DateTimezone("America/Campo_Grande"));
    
            $usuario = new Usuario ($resultado['nome_usuario'], $dataNasc, $resultado['email'], $resultado['senha'], $dataInscricao, $resultado['foto_perfil']);
			$usuario->id = $resultado['id'];
			$usuario->senha = $resultado['senha'];

            array_push($usuarios, $usuario);
		}
		return $usuarios;
    }

	/**
	 * Função que busca um usuário pelo seu email e retorna um objeto usuário ou null caso não exista um usuário com o id passado
	 */
    static public function buscarUsuarioPorEmail($email)
    {	
		Database::createSchema();
        $conexao = Database::getInstance();
        $stm = $conexao->prepare('SELECT * FROM Usuarios WHERE email = :email');
        $stm->bindParam(':email', $email);

        $stm->execute();
        $resultado = $stm->fetch();

        if ($resultado) {

            $dataNasc = new DateTime($resultado['data_nasc'], new DateTimezone("America/Campo_Grande"));
            $dataInscricao = new DateTime($resultado['data_inscricao'], new DateTimezone("America/Campo_Grande"));
    
            $usuario = new Usuario ($resultado['nome_usuario'], $dataNasc, $resultado['email'], $resultado['senha'], $dataInscricao, $resultado['foto_perfil']);
			$usuario->id = $resultado['id'];
            $usuario->senha = $resultado['senha'];

            return $usuario;
        } else {
            return NULL;
        }
    }

	/**
	 * Função que busca um usuário pelo seu id e retorna um objeto usuário ou null caso não exista um usuário com o id passado
	 */
	static public function buscarUsuarioPorId($id)
    {	
		Database::createSchema();
        $conexao = Database::getInstance();
        $stm = $conexao->prepare('SELECT * FROM Usuarios WHERE id = :id');
        $stm->bindParam(':id', $id);

        $stm->execute();
        $resultado = $stm->fetch();

        if ($resultado) {

            $dataNasc = new DateTime($resultado['data_nasc'], new DateTimezone("America/Campo_Grande"));
            $dataInscricao = new DateTime($resultado['data_inscricao'], new DateTimezone("America/Campo_Grande"));
    
            $usuario = new Usuario ($resultado['nome_usuario'], $dataNasc, $resultado['email'], $resultado['senha'], $dataInscricao, $resultado['foto_perfil']);
			$usuario->id = $resultado['id'];
            $usuario->senha = $resultado['senha'];

            return $usuario;
        } else {
            return NULL;
        }
    }


	/**
	 * Função que salva um usuário no banco de dados
	 */
    public function salvar()
    {
        Database::createSchema();
        $conexao = Database::getInstance();

        $stm = $conexao->prepare('insert into usuarios (nome_usuario, data_nasc, email, senha, data_inscricao, foto_perfil) 
        values 
        (:nome_usuario, :dataNasc, :email, :senha, :dataInscricao, :foto_perfil)');

        $stm->bindParam(':nome_usuario', $this->nomeUsuario);
        $stm->bindParam(':dataNasc', $this->dataNasc->format('Y-m-d'));
        $stm->bindParam(':email', $this->email);
        $stm->bindParam(':senha', $this->senha);
        $stm->bindParam(':dataInscricao',$this->dataInscricao->format('Y-m-d'));
        $stm->bindParam(':foto_perfil', $this->fotoPerfil);
        $stm->execute();
    }

    
	
    /**
	 * Função que verifica se o canal já é seguido pelo usuario logado, se sim, deixa de seguir
	 */
    public function seguirCanal($canalSeguido) {
        
		Database::createCanaisSeguidos();
        $conexao = Database::getInstance();

		$stm = $conexao->prepare('select * from canais_seguidos where usuario_seguidor_id = :usuario_seguidor_id and canal_seguido_id = :canal_seguido_id');
        $stm->bindParam(':usuario_seguidor_id', $this->id);
		$stm->bindParam(':canal_seguido_id', $canalSeguido);

        $stm->execute();
        $resultado = $stm->fetch();
        
        if ($resultado) {
            
			$stm = $conexao->prepare('delete from canais_seguidos where usuario_seguidor_id = :usuario_seguidor_id and canal_seguido_id = :canal_seguido_id');
			$stm->bindParam(':usuario_seguidor_id', $this->id);
		    $stm->bindParam(':canal_seguido_id', $canalSeguido);

			$stm->execute();

        } else {
            $stm = $conexao->prepare('insert into canais_seguidos values (:usuario_seguidor_id, :canal_seguido_id)');
			$stm->bindParam(':usuario_seguidor_id', $this->id);
		    $stm->bindParam(':canal_seguido_id', $canalSeguido);

			$stm->execute();
        }
	}

	/**
	 * Retorna todos os canais seguidos por determinado usuário
	 */
	public function getCanaisSeguidos(){
		Database::createFavoritos();
        $conexao = Database::getInstance();
        $canais_seguidos = array();

		$stm = $conexao->prepare('select canal_seguido_id from canais_seguidos where usuario_seguidor_id = :usuario_id');
        $stm->bindParam(':usuario_id', $this->id);

        $stm->execute();
        $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultado as $value) {

			$canal = Usuario::buscarUsuarioPorId($value['canal_seguido_id']);
			
			array_push($canais_seguidos, $canal);
		}
		return $canais_seguidos;
	}

    /**
	 * Função que verifica se o canal já é seguido pelo usuario logado, se sim, retorna um string
	 */
    public function segueCanal($canalSeguidoId) {
        Database::createCanaisSeguidos();
        $conexao = Database::getInstance();

        $stm = $conexao->prepare('select * from canais_seguidos where usuario_seguidor_id = :usuario_seguidor_id and canal_seguido_id = :canal_seguido_id');
        $stm->bindParam(':usuario_seguidor_id', $this->id);
		$stm->bindParam(':canal_seguido_id', $canalSeguidoId);

        $stm->execute();
        $resultado = $stm->fetch();

        if ($resultado) {
            return 'Deixar de Seguir';

        } else {
            return 'Seguir';
        }
    }

    /**
	 * Função que retorna todos os episodios salvos como favoritos de um usuario
	 */
	public function episodiosFavoritos() {
		Database::createFavoritos();
        $conexao = Database::getInstance();
        $episodios = array();

		$stm = $conexao->prepare('select episodio_id from favoritos where usuario_id = :usuario_id');
        $stm->bindParam(':usuario_id', $this->id);

        $stm->execute();
        $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultado as $value) {

			$episodio = Episodio::getEpisodio($value['episodio_id']);
			
			array_push($episodios, $episodio);
		}
		return $episodios;
	}

    
	/**
	 * Função que valida as Fotos passadas no formulário de cadastro de novo usuário, e envia elas para a pasta uploads
	 */
    static public function validarFotos($fotoPerfil, $fotoCanal) {
        
        if(isset($fotoPerfil) && isset($fotoCanal))
        {    
            if ($fotoPerfil['type'] == '' && $fotoPerfil['name'] != '') {
                header('location: /criarConta?mensagem=Sua foto de Perfil excedeu o tamanho permitido!');
                return;
            }
    
            if ($fotoCanal['type'] == '' && $fotoCanal['name'] != '') {
                header('location: /criarConta?mensagem=Sua foto do Canal excedeu o tamanho permitido!');
                return;
            }

            $diretorio = BASEPATH . "uploads/";

			$extensaoFotoPerfil = strtolower(substr($fotoPerfil['name'], -4));
			$novoNomeFotoPerfil = md5(time()).$extensaoFotoPerfil;

            $extensaoFotoCanal = strtolower(substr($fotoCanal['name'], -4));
			$novoNomeFotoCanal = md5(time()+1).$extensaoFotoCanal;
            
            if ($fotoPerfil['name'] == '') {
                $novoNomeFotoPerfil = 'blank-profile-picture-973460__480.png';
            }
            if ($fotoCanal['name'] == '') {
                $novoNomeFotoCanal = 'blank-profile-picture-973460__480.png';
            }

			move_uploaded_file($fotoPerfil['tmp_name'], $diretorio.$novoNomeFotoPerfil);
            move_uploaded_file($fotoCanal['tmp_name'], $diretorio.$novoNomeFotoCanal);

        }
        
        $nomes = array(
			'fotoPerfil' => $novoNomeFotoPerfil,
			'fotoCanal' => $novoNomeFotoCanal
		);

        return $nomes;
    }

	static public function validarFoto($foto) {
        
        if(isset($foto))
        {    
            if ($foto['type'] == '' && $foto['name'] != '') {
                header('location: /criarConta?mensagem=Sua foto excedeu o tamanho permitido!');
                return;
            }


            $diretorio = BASEPATH . "uploads/";

			$extensaoFoto = strtolower(substr($foto['name'], -4));
			$novoNomeFoto = md5(time()).$extensaoFoto;

            /*$extensaoFotoCanal = strtolower(substr($fotoCanal['name'], -4));
			$novoNomeFotoCanal = md5(time()+1).$extensaoFotoCanal;*/
            
            if ($foto['name'] == '') {
                $novoNomeFoto = 'blank-profile-picture-973460__480.png';
            }
        

			move_uploaded_file($foto['tmp_name'], $diretorio.$novoNomeFoto);

        }
        
        /*$nomes = array(
			'fotoPerfil' => $novoNomeFotoPerfil,
			'fotoCanal' => $novoNomeFotoCanal
		);*/

        return $novoNomeFoto;
    }


	/**
	 * Função que valida as informações passadas no formulário de cadastro de novo usuário
	 */
    static public function validarDados($infos)
    {
        
        foreach ($infos as $key => $value) {
        
                if (isset($value) && $value != '') {
                    switch ($key) {
                        case 'nomeUsuario':
                            if (strlen($value) > 60) {
                                header('location: /criarConta?mensagem=Nome de Usuário excedeu o tamanho permitido');
                                return False;
                            }
                            break;
                        case 'nomeCanal':
                            if (strlen($value) > 45) {
                                header('location:/criarConta?mensagem=Nome do Canal excedeu o tamanho permitido!');
                                return False;
                            }
                            break;
                        case 'dataNasc':
                            $date = new DateTime("now", new DateTimezone("America/Campo_Grande"));
                            $dataNasc = new DateTime($value, new DateTimezone("America/Campo_Grande"));
                            if ($date < $dataNasc) {
                                header('location:index.php?acao=criarConta&mensagem=Data inválida!');
                                return False;
                            }   
                            break;
                        case 'descricao':
                            if (strlen($value) > 200) {
                                header('location: /criarConta?mensagem=Descrição excedeu o tamanho permitido!');
                                return False;
                            }
                            break;
                        case 'generos':
                            foreach ($value as $key => $genero) {
                                if (strlen($genero) > 20) {
                                    header('location: /criarConta?mensagem=Gênero excedeu o tamanho permitido!');
                                    return False;   
                                }
                            }
                            break;
                        case 'email':
                            //Verifica se o email é UNIQUE
                            $usuario = self::buscarUsuarioPorEmail($value);
                            if ($usuario ) {
                                header('Location: /criarConta?mensagem=Email já cadastrado!');
                                return False;
                            }
                            if (strlen($value) > 45 ) {
                                header("location: /criarConta?mensagem=Email excedeu o tamanho permitido!");
                                return False;
                            }
                            break;
                        case 'senha':
                            if (strlen($value) > 30) {
                                header('location: /criarConta?mensagem=Senha excedeu o tamanho permitido!');
                                return False;
                            }
                            break;
                        case 'classificacao':
                            if (strlen($value) > 45) {
                                header('location: /criarConta?mensagem=Classificação excedeu o tamanho permitido!');
                                return False;
                            }
                            break;
                    }
    
                } else {
                    header('location: /criarConta?mensagem=Existem campos vazios no formulário!');
                    return False;
                }
            }
            
        return True;
    }

    
}

?>