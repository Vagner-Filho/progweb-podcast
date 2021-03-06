<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <title>login</title>
</head>
<body>
    <section>
        <form action='/login' name='login' id="form" method="POST">
            <header>
                Login
            </header>
            <?php include(__DIR__.'/alert.php') ?>
            <div class='emailUsuario'>
                <label for="email">E-mail</label><br>
                <input type="email" id="email" name="email" 
                value="<?php if(isset($_GET['email'])) {?>  <?= $_GET['email']; }?>"
                 required>
            </div>
            <div class="senhaUsuario">
                <label for="senha">Senha</label><br>
                <input type="password" id="senha" name="senha" required><br>
                <button type="button" id="botao">
                    <img id='img1' class='img1' src="src/rss/img/eye-solid.svg"> 
                    <img id='img2' class='img2' src="src/rss/img/eye-slash-solid.svg" >
                </button><br>
            </div>
            <a href='' class="novaSenha">Esqueci a senha</u></a>
            <br />
            <button id='entrar' class="completarLogin" type="submit">Entrar</button>
        </form>
    </section>
    <footer>
        <br>
        Não tem uma conta?
        <br>
        <button id='novaConta' class='novaConta' onclick="criarConta()">Criar Conta </button>
    </footer>
</body>
</html>
<style>
    body, form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
    }

    header {
        color: #3BB4B4;
        font-size: 2.33rem;
        padding-top: 30px;
        padding-bottom: 40px;
    }

    input {
        text-indent: 10px;
        outline: none;
        height: 50px;
        width: 400px;
        margin-top: 20px;
        font-size: 20px;
        border: 1px solid;
        border-color: rgb(214, 211, 211);
        margin-bottom: 0px;
    }

    input:focus-within {
    border: 2px solid  #3BB4B4 !important;
    }

    .completarLogin {
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
        font-size: 20px;
        background-color: rgb(187, 184, 184);
        height: 70px;
        width: 300px;
        border-radius: 50px;
        border: 0px;
        cursor: pointer;
        margin-top: 40px;
    }

    .senhaUsuario {
        position: relative;
        margin-top: 50px;
        margin-bottom: -10px;
    }

    .senhaUsuario  button {
        background-color: transparent;
        border: 0;
        opacity: .5;
        position: absolute;
        right: 10px;
        top: 40%;
        height: 33px;
        margin-top: 7px;
        padding: 0px;
        cursor: pointer;
    }

    button img {
        margin-top: -2px;
        margin-right: 0px;
        height: 30px;
        width: 30px;
    }

    button .img1 {
        display: initial;
    }

    button .img2 {
        display: none;
        width: 32.5px;
        margin-right: -1.5px;
    }

    .novaSenha {
        color: #000;
        text-decoration: none;
        margin-right: 303px;
        font-size: smaller;
    }

    .novaSenha:hover {
        text-decoration: underline;
    }

    .novaConta {
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
        font-size: larger;
        background-color: #31b8b8;
        border-radius: 50px;
        margin-top: 5px;
        border: 0px;
        height: 50px;
        width: 150px;
    }

    .novaConta:hover {
        background-color: #3ba1a1;
        cursor: pointer;
    }

    input:hover {
        border: 1px solid #3BB4B4;
    }

    .completarLogin:hover {
        background-color: rgb(145, 142, 142);
        border: 1px solid #3BB4B4;
    }

</style>
<script type="text/javascript">

    var botaoMostrarSenha = document.getElementById('botao')
    
    botaoMostrarSenha.addEventListener('click', function(){
        
        let senha = document.getElementById('senha')
        let imagem1 = document.getElementById('img1')
        let imagem2 = document.getElementById('img2')

        if (senha.type == 'password') {
            senha.type = 'text'
            imagem1.style.display = 'none'
            imagem2.style.display = 'initial'
        } else {
            imagem1.style.display = 'initial'
            imagem2.style.display = 'none'
            senha.type = 'password'
        }

    })

    function criarConta() {

        window.location.href = "/criarConta" 
     
    }

</script>

