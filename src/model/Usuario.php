<?php

/**
* Essa classe contem os dados de um usuario, e é guardado no BD.
*/
class Usuario {

    private $nomeUsuario;
    private $nomeCanal;
    private $dataNasc;
    private $descricao;
    private $genero;
    private $email;
    private $senha;
    private $classificacao;
    private $dataInscricao;

    function __construct(string $nomeUsuario, string $nomeCanal, DateTime $dataNasc,
    string $descricao, string $genero, string $email, string $senha, string $classificacao, DateTime $dataInscricao) 
    {
        $this->nomeUsuario = $nomeUsuario;
        $this->nomeCanal = $nomeCanal;
        $this->dataNasc = $dataNasc;
        $this->descricao = $descricao;
        $this->genero = $genero;
        $this->email = $email;
        $this->senha = hash('sha256', $senha);
        $this->classificacao = $classificacao;
        $this->dataInscricao = $dataInscricao;
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


    static public function buscarUsuario($email)
    {
        $conexao = Database::getInstance();
        $stm = $conexao->prepare('SELECT * FROM Usuarios WHERE email = :email');
        $stm->bindParam(':email', $email);

        $stm->execute();
        $resultado = $stm->fetch();

        if ($resultado) {
            $dataNasc = new DateTime($value['data_nasc'], new DateTimezone("America/Campo_Grande"));
            $dataInscricao = new DateTime($value['data_inscricao'], new DateTimezone("America/Campo_Grande"));
    
            $usuario = new Usuario ($resultado['nome_usuario'], $resultado['nome_canal'], $dataNasc,
                $resultado['descricao'], $resultado['genero'], $resultado['email'], $resultado['senha'], 
                $resultado['classificacao'], $dataInscricao);
            
            $usuario->senha = $resultado['senha'];
            return $usuario;
        } else {
            return NULL;
        }
    }

    public function salvar()
    {
        Database::createSchema();
        $conexao = Database::getInstance();

        $stm = $conexao->prepare('insert into usuarios (nome_usuario, 
        nome_canal, data_nasc, descricao, genero, email, senha,
        classificacao, data_inscricao) 
        values 
        (:nome_usuario, :nome_canal, :dataNasc, :descricao, 
        :genero, :email, :senha, :classificacao, :dataInscricao)');

        $stm->bindParam(':nome_usuario', $this->nomeUsuario);
        $stm->bindParam(':nome_canal', $this->nomeCanal);
        $stm->bindParam(':dataNasc', $this->dataNasc->format('Y-m-d'));
        $stm->bindParam(':descricao', $this->descricao);
        $stm->bindParam(':genero', $this->genero);
        $stm->bindParam(':email', $this->email);
        $stm->bindParam(':senha', $this->senha);
        $stm->bindParam(':classificacao', $this->classificacao);
        $stm->bindParam(':dataInscricao',$this->dataInscricao->format('Y-m-d'));
        $stm->execute();
    }

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
                        case 'genero':
                            if (strlen($value) > 20) {
                                header('location: /criarConta?mensagem=Gênero excedeu o tamanho permitido!');
                                return False;
                            }
                            break;
                        case 'email':
                            //Verifica se o email é UNIQUE
                            $usuario = self::buscarUsuario($value);
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