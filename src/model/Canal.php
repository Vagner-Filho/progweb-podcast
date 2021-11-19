<?php

class Canal{
	private $nomeCanal;
	private $descricao;
    private $generos = array();
	private $classificacao;
	private $fotoCanal;

	function __construct(string $nomeCanal, string $descricao, $generos, string $classificacao, string $fotoCanal) 
    {	
        $this->nomeCanal = $nomeCanal;
        $this->descricao = $descricao;
        $this->generos = $generos;
        $this->classificacao = $classificacao;
        $this->fotoCanal = $fotoCanal;
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
}