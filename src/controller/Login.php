<?php 
require '../model/Usuario.php';
require '../model/Database.php';
require 'Controlador.php';

class SiteController extends Controller  {
    
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

    public function login() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $usuario = Usuario::buscarUsuario($_POST['email']);
            if ($usuario && $usuario->igual($_POST['email'], $_POST['senha'])) {
                $_SESSION['user'] = $this->loggedUser = $usuario;
                $this->view('home', $this->loggedUser);
            } else {
                header('Location: index.php?email=' . $_POST['email'] . '&mensagem=Email e/ou senha incorreta!');
            }

        } else {
            if (!$this->loggedUser || $_GET['mensagem'] == 'Email e/ou senha incorreta!') {
                unset($_SESSION['user']);
                $this->view('login');
            } else {
                header('Location:index.php?acao=home');
            }
        }
    }


    public function criarConta() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

            if ($validos) {
                $dataNasc = new DateTime($infos['dataNasc'], new DateTimezone("America/Campo_Grande"));
                $dataInscricao = new DateTime("now", new DateTimezone("America/Campo_Grande"));
                $usuario = new Usuario ($infos['nomeUsuario'], $infos['nomeCanal'], $dataNasc,
                    $infos['descricao'], $infos['genero'], $infos['email'], $infos['senha'], $infos['classificacao'], $dataInscricao);
                
                $usuario->salvar();
                
                header("Location: index.php?email=" . $infos['email'] . "&mensagem=Usuário cadastrado com sucesso!");
                return;
            } else {
                return;
            }
        }
        $this->view('criarConta');
    }

    
    public function account() {
        if (!$this->loggedUser) {
            header('Location: index.php?mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('account', $this->loggedUser);        
    }

    public function channels() {
        if (!$this->loggedUser) {
            header('Location: index.php?mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('channels', $this->loggedUser);        
    }
    
    public function favorites() {
        if (!$this->loggedUser) {
            header('Location: index.php?mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('favorites', $this->loggedUser);        
    }

    public function home() {
        if (!$this->loggedUser) {
            header('Location: index.php?mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('home', $this->loggedUser);        
    }

    public function newEpisode() {
        if (!$this->loggedUser) {
            header('Location: index.php?mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('newEpisode', $this->loggedUser);        
    }

    public function statistic() {
        if (!$this->loggedUser) {
            header('Location: index.php?mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('statistic', $this->loggedUser);        
    }

    public function sair() {
        if (!$this->loggedUser) {
            header('Location: index.php?mensagem=Você precisa se identificar primeiro');
            return;
        }
        unset($_SESSION['user']);
        header('Location: index.php?mensagem=Usuário deslogado com sucesso!');
    }
}

?>