<?php

require 'src/model/Episodio.php';

class NewEpisodeController extends Controller{
	

	public function saveNewEpisode(){
		$infos = array(
			'titulo' => $_POST['titulo-episodio'],
			'descricao' => $_POST['descricao']
		);

		$episodio = new Episodio($infos['titulo'], $infos['descricao']);

		$episodio->salvar();
	}

    
}