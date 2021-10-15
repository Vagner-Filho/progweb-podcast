<body>
    <div class="navbar">
        <button onclick="switchSideMenu(true)" class="align-on-menu hamburguer">
            <img src="../rss/img/menu.svg" alt="hamburguer-menu">
        </button>
        <div class="side-menu">
            <div class="outer-window" onclick="switchSideMenu(false)"></div>
            <button onclick="switchSideMenu(false)" class="align-on-menu hamburguer">
                <img src="../rss/img/menu.svg" alt="hamburguer-menu">
                PODCAST
                </button>
                <div class="h-line"></div>
                <div class="align-on-menu home">
                    <a href="../controller/index.php?acao=home">
                        <img src="../rss/img/home.svg" alt="home-menu">
                        Home
                    </a>
                </div>
                <div class="align-on-menu">
                    <a href="../controller/index.php?acao=favorites">
                        <img src="../rss/img/heart.svg" alt="favorites-menu">
                        Favoritos
                    </a>
                </div>
                <div class="align-on-menu">
                    <a href="../controller/index.php?acao=channels">
                        <img src="../rss/img/list.svg" alt="channels-menu">
                        Canais
                    </a>
                </div>
                <div class="h-line"></div>
                <div class="align-on-menu">
                    <a href="../controller/index.php?acao=newEpisode">
                        <img src="../rss/img/add.svg" alt="new-episode-menu">
                        Novo Episódio
                    </a>
                </div>
                <div class="align-on-menu">
                    <a href="../controller/index.php?acao=statistic">
                        <img src="../rss/img/chart.svg" alt="statistics-menu">
                        Estatísticas
                    </a>
                </div>
                <div class="h-line"></div>
                <div class="align-on-menu">
                    <a href="../controller/index.php?acao=account">
                        <img src="../rss/img/account.svg" alt="account-menu">
                        Conta
                    </a>
                </div>
                <div class="h-line"></div>
                <div class="align-on-menu sair">
                    <a href="../controller/index.php?acao=sair">
                        <img src="../rss/img/sign-out-alt-solid.svg">
                        Sair
                    </a>
                </div>
            </div>
        </div>
</body>

<script>
    function switchSideMenu(open) {
        if (open) {
            const menu = document.querySelector('.side-menu');
            menu.style["display"] = "block"
        }
        else {
            const menu = document.querySelector('.side-menu');
            menu.style["display"] = "none"
        }
        
    }
</script>
    
<style>
    body {
        background-color: pink;
    }
    .navbar {
        width: 100%;
        height: 40.5px;
        background-color: #F5BD9C;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 2;
    }
    .navbar button {
        border: 0;
        background: unset;
    }
    .navbar button:hover {
        cursor: pointer;
    }
    .navbar button {
        border: 0;
        background: unset;
    }
    .navbar button:hover {
        cursor: pointer;
    }
    .side-menu {
        background-color: #F5BD9C;
        width: 200px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        display: none;
        z-index: 999;
    }
    .side-menu:active {
        display: block;
    }
    .h-line {
        height: 1px;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.42);;
        position: relative;
        left: 0;
    }
    .align-on-menu {
        display: flex;
        flex-direction: row;
        align-content: center;
        justify-content: flex-start;
        align-items: center;
        padding: 10px 10px;
        cursor: pointer;
    }
    .align-on-menu a {
        text-decoration: none;
        color: black;
    }
    .align-on-menu img {
        padding: 0 10px;
        height: 20px;
        width: 20px
    }
    .hamburguer {
        font-size: 1.5rem;
        height: 40px;
    }
    .outer-window {
        position: absolute;
        width: 100vw;
        height: 100vh;
        z-index: 99;
        margin-left: 200px;
    }
</style>