<?php 

require 'src/model/Usuario.php';
require 'src/model/Database.php';
require 'src/model/Episodio.php';

require 'Controller.php';

define('BASEPATH', 'src/');

class LoginController extends Controller  {
    
    /*
    Usuario atualmente logado no sistema
    */
    private $loggedUser;
    

    function __construct() {
        session_start();
        if (isset($_SESSION['user'])) {
            $this->loggedUser = $_SESSION['user'];
        }
    }

    public function loginIndex() 
    {
        if (!$this->loggedUser || $_GET['mensagem'] == 'Email e/ou senha incorreta!') 
        {
            unset($_SESSION['user']);
            $this->view('login');
        } else 
        {
            header('Location: /home');
        }
    }


    public function login() 
    {
            $usuario = Usuario::buscarUsuarioPorEmail($_POST['email']);

            if ($usuario && $usuario->igual($_POST['email'], $_POST['senha'])) 
            {
                $_SESSION['user'] = $this->loggedUser = $usuario;
                $this->view('home', $this->loggedUser);
            } else 
            {
                header('Location: /login?email=' . $_POST['email'] . '&mensagem=Email e/ou senha incorreta!');
            }
    }

    public function criarContaIndex() 
    {
        $this->view('criarConta');
    }


    public function criarConta() 
    {
            $infos = array(
                'nomeUsuario' => $_POST['nome-usuario'],
                'nomeCanal' => $_POST['nome-canal'],
                'dataNasc' => $_POST['data-nascimento'],
                'descricao' => $_POST['descricao-episodio'],
                'genero' => $_POST['genero'],
                'email' => $_POST['email'],
                'senha' => $_POST['senha'],
                'classificacao' => $_POST['classificacao']);
            
            $validos = Usuario::validarDados($infos);    

            if ($validos) 
            {
                $dataNasc = new DateTime($infos['dataNasc'], new DateTimezone("America/Campo_Grande"));
                $dataInscricao = new DateTime("now", new DateTimezone("America/Campo_Grande"));

                $usuario = new Usuario ($infos['nomeUsuario'], $infos['nomeCanal'], $dataNasc,
                    $infos['descricao'], $infos['genero'], $infos['email'], $infos['senha'], $infos['classificacao'], $dataInscricao);
                
                $usuario->salvar();
                
                header("Location: /login?email=" . $infos['email'] . "&mensagem=Usuário cadastrado com sucesso!");
                return;
            } else {
                return;
            }
    }

    
    public function account() 
    {
        if (!$this->loggedUser) 
        {
            header('Location: /login?mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('account', $this->loggedUser);        
    }

    public function channels() 
    {
        if (!$this->loggedUser) 
        {
            header('Location: /login?mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('channels', $this->loggedUser);        
    }

	public function mainChannel() 
    {
        if (!$this->loggedUser) 
        {
            header('Location: /login?mensagem=Você precisa se identificar primeiro');    
            return;
        }      
        $this->view('main-channel', $this->loggedUser); 
    }
    
    public function favorites() 
    {
        if (!$this->loggedUser) 
        {
            header('Location: /login?mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('favorites', $this->loggedUser);        
    }

    public function home() 
    {
        if (!$this->loggedUser) 
        {
            header('Location: /login?mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('home', $this->loggedUser);        
    }

    public function newEpisode() 
    {
        if (!$this->loggedUser) 
        {
            header('Location: /login?mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('newEpisode', $this->loggedUser);        
    }

    public function statistic() 
    {
        if (!$this->loggedUser) 
        {
            header('Location: /login?mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('statistic', $this->loggedUser);        
    }

    public function sair() 
    {
        if (!$this->loggedUser) 
        {
            header('Location: /login?mensagem=Você precisa se identificar primeiro');
            return;
        }
        unset($_SESSION['user']);
        header('Location: /login?mensagem=Usuário deslogado com sucesso!');
    }

	public function saveNewEpisode(){

		if(isset($_FILES['foto-episodio']) && isset($_FILES['audio-file'])){
			$extensaoFoto = strtolower(substr($_FILES['foto-episodio']['name'], -4));
			$novoNomeFoto = md5(time()).$extensaoFoto;
			$diretorio = BASEPATH . "uploads/";

			move_uploaded_file($_FILES['foto-episodio']['tmp_name'], $diretorio.$novoNomeFoto);

			$extensaoAudio = strtolower(substr($_FILES['audio-file']['name'], -4));
			$novoNomeAudio = md5(time()).$extensaoAudio;

			move_uploaded_file($_FILES['audio-file']['tmp_name'], $diretorio.$novoNomeAudio);

		}

		$infos = array(
			'titulo' => $_POST['titulo-episodio'],
			'descricao' => $_POST['descricao']
		);


		$episodio = new Episodio($infos['titulo'], $infos['descricao'], $_SESSION['user'], $novoNomeAudio, $novoNomeFoto);

		$episodio->salvar();
        
		//$idCanal = $episodio->__get("canal")->__get("id");
		//$episodio->getEpisodios($_SESSION['user']->id);
		header("Location: /mainChannel");
		//$this->view("main-channel", $this->loggedUser);
		
	}

	
}

?>