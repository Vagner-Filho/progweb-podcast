<?php

if($data){
	$episodios = $data->getEpisodios($_SESSION['user']->__get('id'));
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
                    <div class="ms-4">
                        <div class="channel-info">
                            <div>
                                <div class="icon"></div>
                            </div>
                            <div class="side">
                                <div class="channel-title">
                                    <p>
                                        MATANDO ROBÔS GIGANTES
                                    </p>
                                    <p class="text">
                                        MTG
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="col-10 offset-1">
                    <div class="ms-4">
                        <div class="seguir">
                            <button>Seguir</button>
                        </div>
                        <div class="descricao">
                            <p>Breve descrição.</p>
                        </div>
                        <div class="tags">
                            <button class="tag">Cultura</button>
                            <button class="tag" style="width: 150px";>Entretenimento</button>
                            <button class="tag">Humor</button>
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

					<?php foreach ($episodios as $ep) { ?>
						<div class="ms-4">
							<div class="episodio">
								<div>
									<?php echo "<img src='" . BASEPATH . "uploads/" . $ep->__get('foto') . "' class='icon-conteudo'/>" ?>
								</div>
								<div class="conteudo">
									<div class="title">
										<?= $ep->__get('titulo') ?>
									</div>
									<p>
										<?= $ep->__get('descricao') ?>
									</p>
								</div>
								<img src="src/rss/img/heart.svg" alt="like-button">
							</div>
							
							<div class="divisao">
								<div class="line"></div>
							</div>
						</div>
					<?php } ?>

                    
                    
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
    }

    .conteudo {
        margin-left: 37px;
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
        height: 40px;
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
        height: 30px;
        width: 80px;
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
</style>
