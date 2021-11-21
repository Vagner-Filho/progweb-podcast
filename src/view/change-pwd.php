<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <title>Trocar Senha</title>
</head>
<body>
    <section>
        <form name='alterar' id="form" method="POST">
            <header>
                <h1 class='margin'>
                    <a class='voltar' href='/account'><-</a>
                </h1>
                <div class='nome'>
                     Esqueci a Senha
                </div>
            </header>
            <div class='senhaAtual'>
                <label for="senhaAtual">Senha Atual</label><br>
                <input type="password" id="actualPwd" name="actualPwd">
            </div>
            <br>
            <div class='novaSenha'>
                <label for="novaSenha">Nova Senha</label><br>
                <input type="password" id="newPwd" name="newPwd">
            </div>
            <br>
            <div class='confirmarSenha'>
                <label for="confirmarSenha">Confirme a Senha</label><br>
                <input type="password" id="confirmPwd" name="confirmPwd">
            </div>
            <br>
            <a href='/forgetPassword' class="novaSenha">Esqueci a senha</u></a>
            <button id='alterar' class="completarAlteracao" type="submit">Alterar</button>
        </form>
    </section>
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

    

    .margin {
        margin-top:-30px;
        margin-left:-200px;
    }

    .voltar {
        text-decoration: none;
        color: #3BB4B4;
        font-size: 2.33rem;
        margin-left: 5%;
    }
    
    .nome {
        margin-top:-50px;
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

    .completarAlteracao {
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
        font-size: 20px;
        background-color: rgb(187, 184, 184);
        height: 70px;
        width: 300px;
        border-radius: 50px;
        border: 0px;
        cursor: pointer;
        margin-top: 20px;
    }

    @media (max-width: 655px) {
        
        .voltar {
            margin-left: 100px;
        }
    }
</style>
<script type="text/javascript">

    var botaoAlterar = document.getElementById('alterar')
    const form = document.querySelector('#form')

    //ISSO CANCELA O FORMULARIO PARA MUDAR DE PAGINA
    //Só coloquei aqui pra conseguir navegar entre as páginas, quando
    //a gente colocar as verificações e o banco de dados é só mudar aqui
    form.addEventListener('submit', event => {
        event.preventDefault()
    })
    
    botaoAlterar.addEventListener('click', function(){
        window.location.href = "/account" 
    })

</script>

