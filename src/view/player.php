<?php
    $episodioAtual = Episodio::getEpisodio($_GET['id']);
    $episodios = Episodio::getEpisodios($data->__get('id'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="src/utils/css/bootstrap.css">
    <script src="src/utils/jscript/bootstrap.bundle.js" async></script>
    <script src="src/jscript/components/sideMenu.js"></script>

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
                <div class="wrapper">
                    <article class="card-custom">
                        <div class="icon"></div>
                        <div class="player">
                            <div class="titulo">
                                <p><?= $episodioAtual->titulo ?></p>
                            </div>
                            <div class="button">
                                <button><img src="src/rss/img/play-svgrepo-com.svg" alt="">
                                Play
                                </button>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
            <section>
                <div class="col-10 offset-1">
                    <div class="ms-4">
                        <p><strong>Descrição:</strong> <?= $episodioAtual->descricao ?></p>
                    </div>
                </div>
            </section>
            <section>
                <div class="col-10 offset-1">
                    <div class="ms-4">
                        <div class="main-head">
                            <div class="head-text text-change">
                                <p>
                                    Mais Podcasts
                                </p>
                            </div>
                            <div class="line"></div>
                        </div>
                        <?php 
                        $contador = 0;
                        foreach ($episodios as $ep) { if ($ep->__get('id') != $episodioAtual->__get('id')) {?>

                            <div class="ms-4">
                                <div class="episodio">
                                    <a href="/player?id=<?= $ep->__get('id') ?>">
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
                                    
                                    <!-- Ambos os corações estão na tela, e logo abaixo ele verifica quem vai aparecer-->
                                    <button type='submit' class='favorito'><img class='imagem vermelho' src="src/rss/img/coracaoVermelho.png" alt="like-button" onclick='favoritar(<?= $ep->__get("id") ?>, <?= $contador ?>)'></button>
                                    <button type='submit' class='favorito'><img class='imagem preto' src="src/rss/img/coracaoPreto.png" alt="like-button" onclick='favoritar(<?= $ep->__get("id") ?>, <?= $contador ?>)'></button>
                   
                                    <?php 

                                    //Se esse episodio foi favoritado pelo usuario logado, o coração vermelho aparece, se não, aparece o preto
                                    if ($ep->epFavoritado($data->__get('id'))) { ?>

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
                                
                                <div class="divisao">
                                    <div class="line"></div>
                                </div>
                            </div>
                        <?php $contador++;} } ?>
                
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
        font-size: 1rem;
        padding-right: 10px;
        color: #000;
        padding-top: 10px;
    }

    .text-change {
        min-width: 120px;
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

    .subcard, .subcard-small, .icon-conteudo{
        width: 232px;
        height: 232px;
        background-color: #616161;
        border-radius: 250px;
        flex: 0 0 auto;
    }

    .icon {
        width: 700px;
        height: 375px;
        background-color: #616161;
        border-radius: 35px 35px 0px 0px;
        margin: auto;
    }
    
    .player {
        width: 700px;
        height: 175px;
        background-color: #000;
        border-radius: 0px 0px 35px 35px;
        margin: auto;
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
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        max-width: 70%;
    }

    .title {
        font-size: 30px;
        color: #3BB4B4;
    }

    .channel-title{
		font-size: 40px;
		margin-top: 15px;
		margin-bottom: 120px;
	}

    .divisao {
        margin-top: 5%;
        margin-bottom: 5%;
    }

    .wrapper {
        max-width: 1202px;
        margin: auto;
    }

    .card-custom {
        margin-bottom: 36px;
    }

    .button {
        margin: 0 auto;
        width: 17%;
    }

    .button button{
        height: 40px;
        width: 120px;
        background: #c4c4c4;
        border: 1px solid #c4c4c4;
        border-radius: 30px;
        color: #000;
        font-weight: bold;
        margin: 0 auto;
    }

    .button img{
        height: 20px;
        width: 20px;
    }

    .titulo {
        font-size: 1.5em;
        padding-top: 45px;
        margin: 0 auto;
        width: 64%;
        color: #fff;
        display: flex;
        justify-content: center;
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
</style>
