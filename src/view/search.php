<?php 

$resultados = Usuario::getAllSearches();
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
    <script src="src/js/components/searchBar.js"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">

	<title>Pesquisa</title>
</head>
<body>
    <side-menu></side-menu>
	<div class="container-fluid mt-5">
        <div class="row">
            <search-bar class="mt-5"></search-bar>
            <div class="col-10 offset-1">
                
                <section>
                    <h1>Canais</h1>
                    <div class="subcards-container">
                        <?php foreach ($resultados['usuarios'] as $canal) { ?>
                        	<a href="/mainChannel?id=<?= $canal->__get('id')?>">
								<?php echo "<img src='" . BASEPATH . "uploads/" . $canal->__get('canal')->__get('fotoCanal') . "' class='subcard' />"  ?>
							</a>
						<?php } ?>
                    </div>
                </section>
                
                <section>
                    <h1>Episódios</h1>
                    <div class="subcards-container">
                        <?php foreach ($resultados['episodios'] as $episodio) { ?>
                        	<a href="/player?id=<?= $episodio->__get('id')?>">
								<?php echo "<img src='" . BASEPATH . "uploads/" . $episodio->__get('foto') . "' class='square' />"  ?>
							</a>
						<?php } ?>
                    </div>
                    </div>
                </section>
            </div>
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
        color: #3BB4B4;
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
    }
    .main-head .head-text {
        font-size: 1.8rem;
        padding-right: 10px;
    }

    .text-change {
        min-width: 110px;
    }

    .line {
        height: 1px;
        width: 100%;
        border: 1px solid #3BB4B4;
        margin-right: 10px;
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
    .subcard{
        width: 232px;
        height: 232px;
        background-color: #616161;
        border-radius: 250px;
        flex: 0 0 auto;
        margin: auto 10px;
    }

    .square{
        width: 232px;
        height: 232px;
        background-color: #616161;
        border-radius: 35px;
        flex: 0 0 auto;
        margin: auto 10px;
    }

    .verTudo {
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
        color: #BEBEBE;
        background-color: rgba(255, 255, 255, 0);
        border: 0px;
        cursor: pointer;
    }

    .verTudo:hover {
        text-decoration-line: underline;
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
<script>

</script>