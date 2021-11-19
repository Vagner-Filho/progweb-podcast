
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Criar Conta</title>
</head>
<body>
    <section>
        <form action='/criarConta' name="cadastro" id="form" method="POST" enctype="multipart/form-data">
            <header>
                <h1 class='margin'>
                    <a class='voltar' href='/login'><-</a>
                </h1>
                <div class='nome'>
                    <h1> Criar conta </h1>
                    <h2> <a href="/teste"> aaaaaaa</a></h2>
                </div>
            </header>
            <?php include(__DIR__.'/alert.php') ?>
            <div class="first-line divprincipal">
                <!--<div>
                    <div>
                        <label for="foto-usuario">Insira uma foto de perfil</label>
                        <input type="file" id="foto-usuario" name="foto-usuario" accept="png, .jpg">
                    </div>
                </div>-->
                <div>
                    <label for="nome-usuario">Nome de Usuário</label>
                    <input type="text" id="nome-usuario" name="nome-usuario" required>
                </div>
                <div>
                    <label for="nome-canal">Nome do Canal</label>
                    <input type="text" id="nome-canal" name="nome-canal" required>
                </div>
            </div>
            <div class='second-line divprincipal'>
                <div>
                    <label for="data-nascimento">Data de Nascimento</label>
                    <input type="date" id="data-nascimento" name="data-nascimento" min='1900-01-01' required>
                </div>
                <div>
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" required></textarea>
                </div>
            </div>
            <div class='third-line divprincipal'>
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class='generos'>
                    <div class='tituloGeneros'>
                        <legend>Gêneros</legend>
                    </div>
                    <div class='nomesGeneros'>
                        <div>
                            <input type="checkbox" id="generoEsporte" name="genero[]" value='Esporte'>
                            <label for="generoEsporte" class= 'genero'>Esporte</label>
                        </div>
                        <div>
                            <input type="checkbox" id="generoMusical" name="genero[]" value='Musical'>
                            <label for="generoMusical" class= 'genero'>Musical</label>
                        </div>
                        <div>
                            <input  type="checkbox" id="generoJogos" name="genero[]" value='Jogos'>
                            <label for="generoJogos" class= 'genero'>Jogos</label>
                        </div>
                        <div class='outroGeneroCheckBox'>
                            <input  type="checkbox" id="generoOutro" >
                            <label for="generoOutro" class= 'genero'>Outro</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class='fourth-line divprincipal'>
                <div>           
                    <label for="senha">Senha</label>
                    <input type="text" id="senha" name="senha" required>
                </div>
                <div>
                    <label for="classificacao">Classificação</label>
                    <input type="text" id="classificacao" name="classificacao" required>
                </div>
            </div>
            <div class='foto divprincipal'>
                <div class='fotoDoPerfil'> 
                        <label for="fotoPerfil" class="addPick imagem">
                            <img id='fotoDoPerfil'  class="default-pic">
                        </label>
                        <label for="fotoPerfil" class="addPick">
                            Adicionar foto de Perfil
                        </label>
                        <input type="file" name="fotoPerfil" id="fotoPerfil" class="d-none" accept=".png, .jpg" onchange='previewImagemPerfil()'>
                </div>
                <div  class='fotoDoCanal'>
                    
                <label for="fotoCanal" class="addPick imagem">
                            <img id='fotoDoCanal'  class="default-pic">
                        </label>
                        <label for="foto" class="addPick">
                            Adicionar foto do Canal
                        </label>
                        <input type="file" name="fotoCanal" id="fotoCanal" class="d-none" accept=".png, .jpg" onchange='previewImagemCanal()'>
                </div>
            </div>
            
            <div class="criar">
                <button id="criar" type="submit">Criar conta</button>
            </div>
        </form>
    </section>
        
   
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var checado = document.getElementById('generoOutro');

    $( "#generoOutro" ).click(function() {
        if (checado.checked == true)
        {
        $( ".nomesGeneros" ).append( "<input type='text' id='inputOutroGenero' name='genero[]' >" );
        }
    });

    $( "form" ).on( "click", "#generoOutro", function() {
        if (checado.checked == false)
        {
        $("#inputOutroGenero").remove();
        }
    });


    function previewImagemPerfil() {
        var imagem = document.getElementById('fotoPerfil').files[0]
        var preview = document.getElementById('fotoDoPerfil')

        var reader = new FileReader()

        reader.onloadend = function() {
            preview.src = reader.result
        }

        if (imagem) {
            reader.readAsDataURL(imagem)
        } else {
            preview.src = ''
        }
    }

    function previewImagemCanal() {
        var imagem = document.getElementById('fotoCanal').files[0]
        var preview = document.getElementById('fotoDoCanal')

        var reader = new FileReader()

        reader.onloadend = function() {
            preview.src = reader.result
        }

        if (imagem) {
            reader.readAsDataURL(imagem)
        } else {
            preview.src = ''
        }
    }
</script>

<style>

    body {
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
    }


    .outroGeneroCheckBox {
        margin-bottom:10px;
    }

    #inputOutroGenero {
        margin-top:10px;
    }


    .nomesGeneros {
        display: flex;
        flex-direction: column;
        margin-bottom: -10px;
    }

    .nomesGeneros div {
        display: flex;
        flex-direction: row;
        padding: 0;
        margin: 0;
        margin-bottom:-15px;
    }

    .nomesGeneros input {
        padding: 0;
        margin: 0;
    }

    .nomesGeneros label {
        margin-top: 15px;
        margin-left: 10px;
    }

    .tituloGeneros {
        padding: 0;
        margin:0 ;
        margin-bottom: 15px;
    }

    .d-none {
        display: none;
    }

    .voltar {
        text-decoration: none;
        color: #3BB4B4;
        font-size: 1.83rem;
        margin-left: 5%;
    }

    .margin {
        margin-bottom: -30px;
    }

    div {
        display: flex;
        margin-bottom: 35px;
    }

    .divprincipal > div {
        padding-right: 5%;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .divprincipal > div:nth-child(1) {
        padding-right: 8%;
        padding-left: 8%;
    }

    .imagem {
        height: 200px;
        border-radius: 35px;
        margin-bottom: 20px;
    }

    .foto {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin-bottom: -50px;
    }

    .fotoDoPerfil, .fotoDoCanal {
        
        display: flex;
        justify-content: center;
        align-items: center;
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

    .nome  {
        color: #3BB4B4;
        font-size: 1.33rem;
        padding-left: 8%;
        padding-top: 30px;
        padding-bottom: 5px;
    }
    
    input {
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
        text-indent: 10px;
        outline: none;
        height: 50px;
        margin-top: 20px;
        font-size: 20px;
        border: 1px solid;
        border-color: rgb(214, 211, 211);
        
    }
    input:focus-within, textarea:focus-within {
        border: 2px solid  #3BB4B4 !important;
    }

    input[type='date'] {
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
        width: 100%;
    }

	input[type='file'], input[type='file']:focus-within, input[type='file']:hover{
		border: none;
	}


    /*input:invalid {
        border: 2px solid rgb(206, 4, 4);
    }*/


    input:hover {
        border: 1px solid #3BB4B4;
    }

    textarea:hover {
        border: 1px solid #3BB4B4;
    }

    button:hover {
        background-color: rgb(145, 142, 142);
        border: 1px solid #3BB4B4;
    }

    textarea {
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
        text-indent: 10px;
        height: 140px;
        margin-top: 20px;
        font-size: 20px;
        border: 1px solid;
        border-color: rgb(214, 211, 211);
        outline: none;
        resize: none;
    }

    .criar {
        margin-top: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    button {
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
        font-size: 20px;
        background-color: rgb(187, 184, 184);
        height: 70px;
        width: 300px;
        border-radius: 50px;
        border: 0px;
        cursor: pointer;
    }



    
    @media (max-width: 695px) {
        
        body {
            margin: 0% 10%;
        }

        .voltar {
            margin-left: 0;
        }

        .nome {
            display: flex;
            justify-content: center;
        }
        
        .nomesGeneros {
            margin:10px;
        }

        .nomesGeneros div {
            justify-content:center;            
        }

        .nomesGeneros div input{
            width: 15px;
        }

        div {
            display: block;
        }

        .divprincipal > div:nth-child(1) {
            padding-right: 0%;
            padding-left: 0%;
        }


        input {
            width: 100%;
        }

        .third-line {
            display: flex;
            flex-direction: column-reverse;
            margin-bottom: 0px;
        }

        input[type='date'] {
            width: 100.5%;
        }

        textarea {
            width: 100%;
        }

        .alerta {
            margin-left: 0%;
        }

    }
    
    @media (max-width: 580px) {
        .alerta {
            width: 100%;
        }
    }

</style>