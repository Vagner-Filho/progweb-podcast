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

    function __construct(string $nomeUsuario, string $nomeCanal, $dataNasc,
    string $descricao, string $genero, string $email, string $senha, string $classificacao) {
        $this->nomeUsuario = $nomeUsuario;
        $this->nomeCanal = $nomeCanal;
        $this->dataNasc = $dataNasc;
        $this->descricao = $descricao;
        $this->genero = $genero;
        $this->email = $email;
        $this->senha = hash('sha256', $senha);
        $this->classificacao = $classificacao;
        
    }

    /**
    * Essa função retorna o atributo $campo, que não sei para que serve
    */
    public function __get($campo) {
        return $this->$campo;
    }

    /**
    * Essa função cria o atributo $campo e adiciona a ele o parametro $valor
    */
    public function __set($campo, $valor) {
        return $this->$campo = $valor;
    }

    /**
    * Essa função apenas verifica se as variaveis passadas por parametro são equivalentes
    * aos seus respectivos atributos dessa classe
    */
    public function igual(string $email, string $senha) {
        return $this->email === $email && $this->senha === hash('sha256', $senha);
    }
}

?>