<?php 

require '../model/Usuario.php';
require 'Controlador.php';

class SiteController extends Controller  {
    
    /*
    Usuario atualmente logado no sistema
    */
    private $loggedUser;
    

    function __construct() {
        session_start();
        if (isset($_SESSION['user'])) $this->loggedUser = $_SESSION['user'];
    }


    public function login() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $existeIgual = False;

            if (isset($_SESSION['users'])) {
                foreach ($_SESSION['users'] as $user) {
                    if ($user->igual($_POST['email'], $_POST['senha'])) {
                        $_SESSION['user'] = $this->loggedUser = $user;
                        $existeIgual = True;
                        break;
                    }
                }
            }

            if ($existeIgual) {
                $this->view('home', $this->loggedUser);
            } else {
                header('Location: index.php?email=' . $_POST['email'] . '&mensagem=Email e/ou senha incorreta!');
                return;
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

            if (!isset($_SESSION['users'])) $_SESSION['users'] = array();

            $infos = array(
                'nomeUsuario' => $_POST['nome-usuario'],
                'nomeCanal' => $_POST['nome-canal'],
                'dataNasc' => $_POST['data-nascimento'],
                'descricao' => $_POST['descricao-episodio'],
                'genero' => $_POST['genero'],
                'email' => $_POST['email'],
                'senha' => $_POST['senha'],
                'classificacao' => $_POST['classificacao']);
            
            //$validos = validar($infos);

            $validos = False;

            foreach ($infos as $key => $value) {
                if (isset($value) && $value != '') {
                    switch ($key) {
                        case 'nomeUsuario':
                            if (strlen($value) > 60) {
                                header('location:index.php?acao=criarConta&mensagem=Nome de Usuário excedeu o tamanho permitido');
                                $validos = False;
                            }
                            break;
                        case 'nomeCanal':
                            if (strlen($value) > 45) {
                                header('location:index.php?acao=criarConta&mensagem=Nome do Canal excedeu o tamanho permitido!');
                                $validos = False;
                            }
                            break;
                        case 'dataNasc':
                            $date = new DateTime("now", new DateTimezone("America/Campo_Grande"));;
                            $dataNasc = new DateTime($value, new DateTimezone("America/Campo_Grande"));
                            if ($date < $dataNasc) {
                                header('location:index.php?acao=criarConta&mensagem=Data inválida!');
                                $validos = False;
                            }   
                            break;
                        case 'descricao':
                            if (strlen($value) > 200) {
                                header('location:index.php?acao=criarConta&mensagem=Descrição excedeu o tamanho permitido!');
                                $validos = False;
                            }
                            break;
                        case 'genero':
                            if (strlen($value) > 20) {
                                header('location:index.php?acao=criarConta&mensagem=Gênero excedeu o tamanho permitido!');
                                $validos = False;
                            }
                            break;
                        case 'email':
                            //Verifica se o email é UNIQUE
                            foreach ($_SESSION['users'] as $user) {
                                if ($user->email == $value) {
                                    header('Location:index.php?acao=criarConta&mensagem=Email já cadastrado!');
                                    $validos = False;
                                }
                                if (strlen($value) > 45 ) {
                                    header("location:index.php?acao=criarConta&mensagem=Email excedeu o tamanho permitido!");
                                    $validos = False;
                                }
                            }
                            break;
                        case 'senha':
                            if (strlen($value) > 30) {
                                header('location:index.php?acao=criarConta&mensagem=Senha excedeu o tamanho permitido!');
                                $validos = False;
                            }
                            break;
                        case 'classificacao':
                            if (strlen($value) > 45) {
                                header('location:index.php?acao=criarConta&mensagem=Classificação excedeu o tamanho permitido!');
                                $validos = False;
                            }
                            break;
                    }
    
                } else {
                    header('location:index.php?acao=criarConta&mensagem=Existem campos vazios no formulário!');
                    $validos = False;
                }
            }
            $validos = True;

            if ($validos) {
                $user = new Usuario ($infos['nomeUsuario'], $infos['nomeCanal'], $infos['dataNasc'],
                    $infos['descricao'], $infos['genero'], $infos['email'], $infos['senha'], $infos['classificacao']);
                
                array_push($_SESSION['users'], $user);
                
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
            header('Location: index.php?acao=entrar&mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('account', $this->loggedUser);        
    }

    public function channels() {
        if (!$this->loggedUser) {
            header('Location: index.php?acao=entrar&mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('channels', $this->loggedUser);        
    }
    
    public function favorites() {
        if (!$this->loggedUser) {
            header('Location: index.php?acao=entrar&mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('favorites', $this->loggedUser);        
    }

    public function home() {
        if (!$this->loggedUser) {
            header('Location: index.php?acao=entrar&mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('home', $this->loggedUser);        
    }

    public function newEpisode() {
        if (!$this->loggedUser) {
            header('Location: index.php?acao=entrar&mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('newEpisode', $this->loggedUser);        
    }

    public function statistic() {
        if (!$this->loggedUser) {
            header('Location: index.php?acao=entrar&mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('statistic', $this->loggedUser);        
    }

    public function sair() {
        if (!$this->loggedUser) {
            header('Location: index.php?acao=entrar&mensagem=Você precisa se identificar primeiro');
            return;
        }
        unset($_SESSION['user']);
        header('Location: index.php?mensagem=Usuário deslogado com sucesso!');
    }
}

?>