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
                        <div class="subcard"></div>
                        <div class="subcard"></div>
                        <div class="subcard"></div>
                        <div class="subcard"></div>
                        <div class="subcard"></div>
                        <div class="subcard"></div>
                        <div class="subcard"></div>
                        <div class="subcard"></div>
                        <div class="subcard"></div>
                        <div class="subcard"></div>
                        <div class="subcard"></div>
                    </div>
                </div>
			</section>

			<section>
                <div class="col-10 offset-1">
                    <div class="head">
                        <div class="head-text">
                            Inscrições
                        </div>
                        <div class="line"></div>
                    </div>
					<div class="subcards-container">
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                    </div>
                </div>
			</section>

			<section>
                <div class="col-10 offset-1">
                    <div class="head">
                        <div class="head-text text-change">
                            Para você
                        </div>
                        <div class="line"></div>
                    </div>
					<div class="subcards-container">
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                    </div>
                </div>
			</section>

			<section>
                <div class="col-10 offset-1">
                    <div class="head">
                        <div class="head-text">
                            Tecnologia
                        </div>
                        <div class="line"></div>
                    </div>
					<div class="subcards-container">
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
                        <div class="subcard-small"></div>
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
        justify-content: space-between;
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
