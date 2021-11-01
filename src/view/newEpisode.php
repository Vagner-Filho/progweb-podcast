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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <script src="src/utils/js/bootstrap.bundle.js" async></script>
    <script src="src/jscript/components/sideMenu.js"></script>

    <title>Novo Episódio</title>
</head>

<body>
    <side-menu></side-menu>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-xxl-4 offset-xxl-4 col-12">
                <form method="POST" action="/newEpisode" class="novo-episodio mt-5">
                    <div class='foto'>
                        <a href=#>
                            <div id='foto'class="default-pic"></div>
                        </a>
                        <a href=# class="addFoto">
                            <label for="foto" class="addPick">Adicionar foto</label>
                        </a>
                    </div>
                    <label for="titulo-episodio" class="mt-5">Titulo do episódio</label>
                    <input type="text" id="titulo-episodio" name="titulo-episodio">
                    <label for="descricao-episodio" class="mt-4">Descrição</label>
                    <textarea id="descricao-episodio" rows="5" cols="33" name="descricao"></textarea>
                    <label for="audio-file" class="audio-input mt-5">
                        <div class="mt-5">
                            Adicionar arquivo de áudio
                        </div>    
                    </label>
                    <input type="file" id="audio-file" class="d-none">
                    <button class="btn-cinza mt-5" type="submit">Salvar Episódio</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<style>
    body, input, textarea, button {
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
    }
    form {
        margin: 0% 7% 2% 7%;
    }
    input {
        height: 40px;
    }
    input, textarea {
        text-indent: 10px;
        font-size: 17px;
        border: 1px solid;
        border-color: rgb(133, 132, 132);
        outline: none;
        margin-top: 10px;
        margin-right: 25%;
    }
    textarea:focus-within, input:focus-within {
        border: 2px solid  #3BB4B4 !important;
    }
    input:hover, textarea:hover {
        border: 1px solid #3BB4B4;
    }
    .foto {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 200px;
    }
    .addPick {
        text-decoration: underline;
        color: black;
    }
    .addPick:hover {
        cursor: pointer;
    }
    .default-pic {
        width: 200px;
        height: 200px;
        background-color: #616161;
        border-radius: 35px;
    }
    .novo-episodio {
        display: flex;
        flex-direction: column;
    }
    .novo-episodio a:nth-child(1) {
        border-radius: 35px;
        right: 0;
        margin-bottom: 20px;
    }
    .audio-input {
        background: url('src/rss/img/cloud_upload.svg');
        background-repeat: no-repeat;
        background-color: #E0E0E0;
        height: 100px;
        background-position: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .audio-input:hover {
        background-color: rgb(185, 182, 182);
        border: 1px solid #3BB4B4;
        cursor: pointer;
    }

    button:hover {
        background-color: rgb(185, 182, 182);
        border: 1px solid #3BB4B4;
    }
    .btn-cinza {
        font-size: 20px;
        background-color:#C4C4C4;
        height: 60px;
        width: 250px;
        border-radius: 50px;
        border: 0px;
        margin: auto;
        line-height: 30px;
    }
    
</style>