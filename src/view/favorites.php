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
                <section class="podcast-container">
                    <img src="src/rss/img/exampleThumb.svg" alt="podcast-capa">
                    <div class="podcast-info">
                        <h5 class="head">
                            Lorem ipsum massa
                        </h5>
                        <p>
                            Lorem ipsum aliquam purus non per ullamcorper tristique vivamus, 
                            blandit volutpat hendrerit sem dapibus felis enim bibendum, 
                            dolor a viverra aliquam sit habitant hendrerit. 
                            nam curae diam nullam aliquam convallis varius ultricies tortor
                        </p>
                    </div>
                    <div class="options">
                        <img src="src/rss/img/heart.svg" alt="like-button">
                        <img src="src/rss/img/list.svg" alt="like-button">
                    </div>
                </section>
                <section class="podcast-container">
                    <img src="src/rss/img/exampleThumb.svg" alt="podcast-capa">
                    <div class="podcast-info">
                        <h5 class="head">
                            Lorem ipsum massa
                        </h5>
                        <p>
                            Lorem ipsum aliquam purus non per ullamcorper tristique vivamus, 
                            blandit volutpat hendrerit sem dapibus felis enim bibendum, 
                            dolor a viverra aliquam sit habitant hendrerit. 
                            nam curae diam nullam aliquam convallis varius ultricies tortor
                        </p>
                    </div>
                    <div class="options">
                        <img src="src/rss/img/heart.svg" alt="like-button">
                        <img src="src/rss/img/list.svg" alt="like-button">
                    </div>
                </section>
                <section class="podcast-container">
                    <img src="src/rss/img/exampleThumb.svg" alt="podcast-capa">
                    <div class="podcast-info">
                        <h5 class="head">
                            Lorem ipsum massa
                        </h5>
                        <p>
                            Lorem ipsum aliquam purus non per ullamcorper tristique vivamus, 
                            blandit volutpat hendrerit sem dapibus felis enim bibendum, 
                            dolor a viverra aliquam sit habitant hendrerit. 
                            nam curae diam nullam aliquam convallis varius ultricies tortor
                        </p>
                    </div>
                    <div class="options">
                        <img src="src/rss/img/heart.svg" alt="like-button">
                        <img src="src/rss/img/list.svg" alt="like-button">
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
    .podcast-container {
        display: flex;
        max-width: 1000px;
        margin: 0 auto 30px;
    }
    .podcast-info {
        padding: 30px
    }
    .options {
        padding-top: 30px;
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
    .highlights {
        display: flex;
        justify-content: center;
    }
    .highlights .main-card {
        width: 343px;
        height: 347px;
        margin: 30px auto;
    }
    .subcards-container {
        margin: 30px auto;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        overflow-x: auto;
        justify-content: space-between;
        width: 100%;
    }
    .subcard {
        width: 232px;
        height: 232px;
        background-color: #616161;
        border-radius: 25px;
        flex: 0 0 auto;
        margin: auto 10px;
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

    @media (max-width: 576px) {
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
            position: absolute;
            bottom: 185px;
            left: 0;
        }
    }
</style>