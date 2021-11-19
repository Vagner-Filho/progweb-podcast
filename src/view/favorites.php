<?php 
if (!$data) {
	header('location: /login?mensagem=Você precisa se identificar primeiro');
}
$episodios = $data->episodiosFavoritos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="src/jscript/components/sideMenu.js"></script>

    <link rel="stylesheet" href="src/utils/css/bootstrap.css">
    <script src="src/utils/js/bootstrap.bundle.js" async></script>
    <script src="src/jscript/components/searchBar.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">

    <title>Favoritos</title>
</head>
<body>
    <side-menu></side-menu>
    <div class="container-fluid mt-5">
        <div class="row">
            <search-bar class="mt-5"></search-bar>
            <div class="col-10 offset-1">
                <div class="main-head">
                    <div class="head-text">
                        <h1>
                            Favoritos
                        </h1>
                    </div>
                    <div class="line"></div>
                </div>
                <?php
                    $contador = 0;
                    foreach ($episodios as $ep) { ?>
                        
                            
						<div class="podcast-container">
							<a class='foto' href="/player?id=<?= $ep->__get('id')?>">
								<div>
									<?php echo "<img src='" . BASEPATH . "uploads/" . $ep->__get('foto') . "' class='icon-conteudo'/>" ?>
								</div>
							</a>
							<div class="podcast-info">
								<div class="head">
									<?= $ep->__get('titulo') ?>
								</div>
								<p>
									<?= $ep->__get('descricao') ?>
								</p>
							</div>
							<div class='options'>
							<!-- Ambos os corações estão na tela, e logo abaixo ele verifica quem vai aparecer-->
							<button type='submit' class='favorito'><img class='imagem vermelho' src="src/rss/img/coracaoVermelho.png" alt="like-button" onclick='favoritar(<?= $ep->__get("id") ?>, <?= $contador ?>)'></button>
							<img class='listar' src="src/rss/img/list.svg" alt="like-button">
														
							</div>
						</div>
                    <?php $contador++;}  ?>
            </div>
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

        var divEpisodio = document.getElementsByClassName('podcast-container')[contador]
        divEpisodio.style.display = 'none'
    }
</script>
<style>
    body {
        background-color: #fff;
    }

    .preto {
        display: none;
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
    .icon, .icon-conteudo{
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
        width: 232px;
        height: 232px;
        border-radius: 40px;

    }
    .podcast-container {
        display: flex;
        max-width: 1000px;
        margin: 0 auto 30px;
        position: relative;
    }
    .podcast-info {
        max-width: 65%;
        text-overflow: ellipsis;
        overflow: hidden;
        padding: 30px;
        
    }
    .options {
        position: absolute;
        right: 0;
        margin-top: 15px;
    }
    .listar {
        margin-top: 60px;
        width: 35px; 
        height: 35px;
        margin-right: 6px;
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
        .podcast-info {
            max-width: 60%;
        }
    }

    @media (max-width: 976px) {
        .podcast-info {
            max-width: 55%;
        }
    }

    @media (max-width: 876px) {
        .podcast-info {
            max-width: 50%;
        }
    }

    @media (max-width: 776px) {
        .podcast-info {
            max-width: 45%;
        }
    }
    @media (max-width: 676px) {
        .podcast-container {
            flex-direction: column;
            position: relative;
        }
        .podcast-container img {
            margin: auto;
        }
        .podcast-info {
            padding-left: 0 !important;
        }
        .podcast-info p {
            height: 100px;
            text-overflow: ellipsis;
            overflow: hidden;
        }
        .podcast-info .head {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }
        .options {
            margin-right:30px;
        }
        .foto {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
    }
</style>