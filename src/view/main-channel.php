<?php
/*
if($data){
	$episodios = $data->getEpisodios($_SESSION['user']->__get('id'));
}*/
$usuario = Usuario::buscarUsuarioPorId($_GET['id']);
$episodios = Episodio::getEpisodios($usuario->__get('id'));

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="src/utils/css/bootstrap.css">
    <script src="src/utils/js/bootstrap.bundle.js" async></script>
    <script src="src/js/components/sideMenu.js"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">

	<title>Canais</title>
</head>
<body>
    <side-menu></side-menu>
	<div class="container-fluid mt-5">
        <div class="row">
            <section>
                <div class="col-10 offset-1">
                    <div class="ms-4">
                        <div class="channel-info">
                            <div>
                                <?php echo "<img src='" . BASEPATH . "uploads/" . $usuario->__get("canal" )->__get('fotoCanal') . "' class='fotoCanal'/>" ?>
                            </div>
                            <div class="side">
                                <div class="channel-title">
                                    <p>
                                        <?= $usuario->__get('canal')->nomeCanal ?>
                                    </p>
                                    <!--<p class="text">
                                        MTG
                                    </p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="col-10 offset-1">
                    <div class="ms-4">
                        <?php if ($usuario->id != $data->id) { ?>
                        <div class="seguir">
                            <button onclick='seguirCanal(<?=$usuario->id?>)'>
                                <h7 id='Segue' class='<?php if ($data->segueCanal($usuario->id)=='Deixar de Seguir') { ?>naoSegue<?php } else { ?>seguindo<?php } ?>'>
                                    
                                <?php echo $data->segueCanal($usuario->id) ?></h7></button>
                        </div>
                        <?php } ?>
                        <div class="descricao">
                            <p><?= $usuario->descricao ?></p>
                        </div>
                        <div class="tags">
                        <?php foreach ($usuario->canal->generos as $genero) { ?> 
                            <button class="tag"><?= $genero ?></button>
                        <?php } ?>
                            
                            <!--<button class="tag" style="width: 150px";>Entretenimento</button>
                            <button class="tag">Humor</button>-->
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="col-10 offset-1">

                    
                    <div class="ms-4">
                        <div class=ordenacao>
                            <p>Todos os episódios</p>
                        </div>
                        
                    </div>

                    <?php 
                    $contador = 0;
                    foreach ($episodios as $ep) { ?>
                        
                        <div class="ms-4">
                            <div class="episodio">
                                <a href="/player?id=<?= $ep->__get('id')?>">
                                    <div>
                                        <?php echo "<img src='" . BASEPATH . "uploads/" . $ep->__get('foto') . "' class='icon-conteudo'/>" ?>
                                    </div>
                                </a>
                                <div class="conteudo">
                                    <div class="title">
                                        <?= $ep->__get('titulo') ?>
                                    </div>
                                    <p>
                                        <?= $ep->__get('descricao') ?>
                                    </p>
                                </div>
                                <div class='options'>
                                <!-- Ambos os corações estão na tela, e logo abaixo ele verifica quem vai aparecer-->
                                <button type='submit' class='favorito'><img class='imagem vermelho' src="src/rss/img/coracaoVermelho.png" alt="like-button" onclick='favoritar(<?= $ep->__get("id") ?>, <?= $contador ?>)'></button>
                                <button type='submit' class='favorito'><img class='imagem preto' src="src/rss/img/coracaoPreto.png" alt="like-button" onclick='favoritar(<?= $ep->__get("id") ?>, <?= $contador ?>)'></button>
                
                                <?php 

                                //Se esse episodio foi favoritado pelo usuario logado, o coração vermelho aparece, se não, aparece o preto
                                if ($ep->epFavoritado($usuario->__get('id'))) { ?>

                                    <script>
                                        var imagem1 = document.getElementsByClassName('vermelho')[<?= $contador ?>]
                                        var imagem2 = document.getElementsByClassName('preto')[<?= $contador ?>]
                                        
                                        imagem1.style.display = 'initial'
                                        imagem2.style.display = 'none'
                                    </script>


                                <?php } else { ?> 
                                
                                    <script>
                                        var imagem1 = document.getElementsByClassName('vermelho')[<?= $contador ?>]
                                        var imagem2 = document.getElementsByClassName('preto')[<?= $contador ?>]
                                        
                                        imagem1.style.display = 'none'
                                        imagem2.style.display = 'initial'
                                    </script>

                                <?php } ?>                           
                                </div>
                            </div>
                            
                            <div class="divisao">
                                <div class="line"></div>
                            </div>
                        </div>
                    <?php $contador++;}  ?>

                    
                    
                </div>
            </section>
        </div>
    </div>
</body>
</html>

<script>
    function favoritar(episodioId, contador) {
        var url = "http://localhost/cadastrarFavorito?episodioId="+episodioId

        var request = new XMLHttpRequest()
        request.open("GET", url)
        //request.setRequestHeader("Accept", "application/json");
        request.setRequestHeader("Content-Type", "application/json");

        request.onreadystatechange = function () {
        if (request.readyState === 4) {
            console.log(request.status);
            console.log(request.responseText);
        }};
        
        var data = {
            "episodioId": episodioId
        }

        request.send(JSON.stringify(data))

        var imagem1 = document.getElementsByClassName('vermelho')[contador]
        var imagem2 = document.getElementsByClassName('preto')[contador]
        
        if (imagem1.style.display == 'initial')
        {    
            imagem1.style.display = 'none'
            imagem2.style.display = 'initial'
        } 
        else 
        {
            imagem1.style.display = 'initial'
            imagem2.style.display = 'none'
        }
    }

    function seguirCanal(canal) {
        var url = "http://localhost/seguirCanal?canalId="+canal

        var request = new XMLHttpRequest()
        request.open("GET", url)
        //request.setRequestHeader("Accept", "application/json");
        request.setRequestHeader("Content-Type", "application/json");

        request.onreadystatechange = function () {
        if (request.readyState === 4) {
            console.log(request.status);
            console.log(request.responseText);
        }};
        
        var data = {
            "canalId": canal
        }

        request.send(JSON.stringify(data))

        var botao = document.getElementById('Segue')
        console.log(botao)
        if (botao.className=='seguindo') {
            botao.textContent = 'Deixar de Seguir'
            botao.className='naoSegue'
        } else {
            botao.textContent = 'Seguir'
            botao.className='seguindo'
        }
    }

    /*function naoRedirecionar() {
        event.preventDefault();
    }*/
</script>
<style>
    
    body {
        background-color: #fff;
    }

    .favorito {
        background-color: transparent;
        border: 0px;
        position: absolute;
        right:0;
        top: 15%;
        width: 0px; 
        height: 0px;
    }

    .fotoCanal {
        width: 230px;
        height: 230px;
        border-radius: 30px;
    }

    .imagem {
        width: 35px; 
        height: 35px;
        margin-left:-35px;
    }

    .text {
        color: rgb(0, 0, 0);
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
        font-size: 0.5em;
    }

    .main-head, .head {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .main-head .head-text {
        font-size: 1.8rem;
        padding-right: 10px;
    }

    .main-head, .head {
        color: #3BB4B4;
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
    }

    .head, .head-text {
        font-size: 1.33rem;
        padding-right: 10px;
    }

    .line {
        height: 1px;
        width: 100%;
        border: 1px solid #3BB4B4
    }

    .subcard, .subcard-small, .icon, .icon-conteudo{
        width: 232px;
        height: 232px;
        background-color: #616161;
        border-radius: 250px;
        flex: 0 0 auto;
    }

    .icon {
        border-radius: 35px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        margin-bottom: 5px;
    }

    .icon-conteudo{
        width: 159px;
        height: 159px;
        border-radius: 100px;

    }
    
    .channel-info, .episodio {
        display: flex;
        flex-direction: row;
        margin-bottom: 38px;
        position: relative;
    }

    .conteudo {
        margin-left: 37px;
        max-width: 70%;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .title {
        font-size: 30px;
        color: #3BB4B4;

    }

    .ordenacao {
        font-size: 22px;
        color: #000;
        margin-bottom: 40px;
    }

    .channel-title{
		font-size: 40px;
		margin-top: 15px;
		margin-bottom: 120px;
	}

    .side{
        margin-left: 1em;
	}

    .seguir button {
        min-height: 40px;
        width: 120px;
        margin: 7px, 7px, 7px, 0px;
        background: #c4c4c4;
        border: 1px solid #c4c4c4;
        border-radius: 10px;
        color: #000;
        font-weight: bold;
        margin-bottom: 38px;
    }

    .seguir button:hover {
        color: #fff;
        background: #3b3b3b;
    }

    .descricao {
        margin-bottom: 38px;
    }

    .tags {
        margin-bottom: 38px;
    }

    .tags button {
        height: 35px;
        min-width: 90px;
        margin: 7px, 7px, 7px, 0px;
        background: #e2e2e2;
        border: 1px solid #e2e2e2;
        border-radius: 30px;
        color: #000;
        font-weight: bold;
        margin-right: 50px;
        margin-bottom: 10px;
    }

    .line {
        height: 1px;
        width: 100%;
        border: 1px solid #3BB4B4;
    }

    .divisao {
        margin-top: 5%;
        margin-bottom: 5%;
    }

    /* width */
    ::-webkit-scrollbar {
        height: 7px;
    }
    
    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }
    
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    @media (max-width: 1076px) {
        .conteudo {
            max-width: 65%;
        }
    }

    @media (max-width: 976px) {
        .conteudo {
            max-width: 60%;
        }
    }

    @media (max-width: 876px) {
        .conteudo {
            max-width: 55%;
        }
    }

    @media (max-width: 776px) {
        .conteudo {
            max-width: 50%;
        }
    }

    @media (max-width: 676px) {
        .episodio {
            flex-direction: column;
            position: relative;
        }
        .episodio a {
            margin: auto;
        }
        .conteudo {
            padding-left: 0 !important;
        }
        .conteudo p {
            height: 100px;
            text-overflow: ellipsis;
            overflow: hidden;
        }
        .conteudo .title {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }
        .options {
            bottom: 0;
            left: 0;
        }
    }
</style>
