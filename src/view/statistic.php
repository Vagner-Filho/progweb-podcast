<?php 
if (!$data) {
	header('location: /login?mensagem=Você precisa se identificar primeiro');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="src/utils/css/bootstrap.css">
    <script src="src/utils/js/bootstrap.bundle.js" async></script>
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
                <div class="col-10 offset-1">
                    <div class="main-head">
                        <div class="head-text">
                            Estatísticas do Canal
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="subcards-container">   
                        <div>
                            <img src="/src/rss/img/graficoUm.png" alt="gráfico de média de reproduções.">
                        </div>
                        <div>
                            <img src="/src/rss/img/graficoDois.png" alt="gráfico em pizza da média de idade dos ouvintes.">
                        </div>
                    </div>
                    <div class="divisao">
                        <div class="line"></div>
                    </div>
                </div>
			</section>

			<section>
                <div class="col-10 offset-1">
                    <div class="head">
                        <div class="head-text">
                            Podcast Mais Reproduzido
                        </div>
                    </div>
                    <div class="block-displayed">
                        <div class="icon"></div>
                        <div class="info-text">MRG 569: Videogames são os filmes do futuro?</div>
                    </div>
                    <div class="block-displayed">
                        
                    </div>
                    <div class="subcards-container">
                        <div >
                            <div class="info-text">250k</div>
                            <div class="text">favoritos</div>
                        </div>
                        <div >
                            <div class="info-text-center">1,3 BI</div>
                            <div class="text">reproduções</div>
                        </div>
                        <div >
                            <div class="info-text">101k</div>
                            <div class="text">downloads</div>
                        </div>
                    </div>
                    <div class="divisao">
                        <div class="line"></div>
                    </div>
                </div>
			</section>

			<section>
                <div class="col-10 offset-1">
                    <div class="head">
                        <div class="head-text">
                            Monetização
                        </div>
                    </div>
					<div>
                        <div>
                        <img src="/src/rss/img/graficoTres.png" alt="gráfico de monetização do canal de acordo com as últimas semanas." class="displayed">
                        <div>
                    </div>
                </div>
			</section>
        </div>
    </div>
</body>
</html>

<style>
    body {
        background-color: #fff;
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
    
    .subcards-container {
        margin: 45px auto;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        overflow-x: auto;
        justify-content: space-between;
        width: 100%;
    }
    .subcard, .subcard-small, .icon{
        width: 232px;
        height: 232px;
        background-color: #616161;
        border-radius: 250px;
        flex: 0 0 auto;
        margin: auto 10px;
    }

	.subcard-small{
		width: 200px;
		height: 200px;
	}

    .icon {
        border-radius: 35px;
        box-shadow: 2px 2px 1px rgba(0, 0, 0, 0.3);
        margin-bottom: 5px;
    }

    .divisao {
        margin-top: 5%;
        margin-bottom: 5%;
    }

    .displayed {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .block-displayed {
        margin-top: 5%;
        margin-left: auto;
        margin-right: auto;
        width: 16.5em;
    }

    .info-text, .info-text-center {
        text-align: center;
        font-size: 20px;
        color: #000000;
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
    }

    .info-text-center {
        font-size: 50px;
    }

    .text {
        color: #3BB4B4;
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
        text-align: center;
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
</style>
