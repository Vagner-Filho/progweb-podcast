<?php 
if (!$data) {
	header('location:login.php?mensagem=Você precisa se identificar primeiro');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Usem estas duas referências externas -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> -->

    <!-- Tô apanhando pra aprender a usar módulos, então por motivos de prazo, bora usar as coisas internamente
    O que consiste em baixar o código fonte, incluir na pasta utils e fazer a referência onde quer usar :) -->
    <link rel="stylesheet" href="../utils/css/bootstrap.css">
    <script src="../utils/js/bootstrap.bundle.js" async></script>
    <script src="../js/components/sideMenu.js"></script>
    <script src="../js/components/searchBar.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <title>Home</title>
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
                            Destaques
                        </div>
                        <div class="line"></div>
                    </div>
                    <div class="highlights">
                        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                  <div class="main-card" style="background-color: gray;">
                                  </div>
                                <!-- <img src="..." class="d-block w-100" alt="..."> -->
                              </div>
                              <div class="carousel-item">
                                  <div class="main-card" style="background-color: lightgray;">
                                  </div>
                                <!-- <img src="..." class="d-block w-100" alt="..."> -->
                              </div>
                              <div class="carousel-item">
                                  <div class="main-card" style="background-color: black;">
                                  </div>
                                <!-- <img src="..." class="d-block w-100" alt="..."> -->
                              </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="col-10 offset-1">
                    <div class="head">
                        <div class="head-text">
                            Comédia
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
                            Ciência
                        </div>
                        <div class="line"></div>
                    </div>
                    <div class="subcards-container">
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
                            Tecnologia
                        </div>
                        <div class="line"></div>
                    </div>
                    <div class="subcards-container">
                        <div class="subcard"></div>
                        <div class="subcard"></div>
                        <div class="subcard"></div>
                        <div class="subcard"></div>
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
        z-index: 1;
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
</style>