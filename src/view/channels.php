<?php 
if (!$data) {
	header('location: /login?mensagem=Você precisa se identificar primeiro');
}

$canais = Usuario::getAll();
$canais_seguidos = $data->getCanaisSeguidos();
$generos = $data->getGeneros();
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
    <script src="src/jscript/components/searchBar.js"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">

	<title>Canais</title>
</head>
<body>
    <side-menu></side-menu>
	<div class="container-fluid mt-5">
        <div class="row">
            <search-bar class="mt-5"></search-bar>
            <section>
                <div class="col-10 offset-1">
                    <div class="main-head">
                        <div class="head-text">
                            Recentes
                        </div>
                        <div class="line"></div>
                    </div>
					<div class="subcards-container">
						<?php foreach ($canais as $canal) { ?>
                        	<a href="/mainChannel?id=<?= $canal->__get('id')?>">
								<?php echo "<img src='" . BASEPATH . "uploads/" . $canal->__get('canal')->__get('fotoCanal') . "' class='subcard' />"  ?>
							</a>
						<?php } ?>
                    </div>
                </div>
			</section>

			<section>
                <div class="col-10 offset-1">
                    <div class="head">
                        <div class="head-text">
                            Seguindo
                        </div>
                        <div class="line"></div>
                    </div>
					<div class="subcards-container">
						<?php if(count($canais_seguidos) == 0){
								echo "Você não segue nenhum canal ainda.";
							}
							foreach ($canais_seguidos as $canal_seguido) { ?>
							<a href="/mainChannel?id=<?= $canal_seguido->__get('id')?>">
								<?php echo "<img src='" . BASEPATH . "uploads/" . $canal_seguido->canal->__get('fotoCanal') . "' class='subcard-small' />"  ?>
							</a>
						<?php } ?>
                    </div>
                </div>
			</section>

			<section>
                <div class="col-10 offset-1">
					<?php foreach ($generos as  $value) { ?>
						
						<div class="head">
							<div class="head-text">
								<?= $value ?>
							</div>
							<div class="line"></div>
						</div>

						<div class="subcards-container">
							<?php foreach ($canais as $canal) {
								$g = $canal->__get('canal')->__get('generos');
								if(in_array($value, $g, false)){	
							?>
								<a href="/mainChannel?id=<?= $canal->__get('id')?>">
									<?php echo "<img src='" . BASEPATH . "uploads/" . $canal->__get("canal")->__get('fotoCanal') . "' class='subcard-small' />"  ?>
								</a>
							<?php } } ?>

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

    .text-change {
        min-width: 110px;
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
        width: 100%;
    }
    .subcard, .subcard-small{
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
