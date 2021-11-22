<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/components/sideMenu.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <title>Trocar Senha</title>
</head>
<body>
    <side-menu></side-menu>
    <section>
        <form name='alterar' id="form" method="POST">
            <header>
                Alterar Canal
            </header>
            <div class='nomeUsuario'>
                <label for="nomeUsuario">Nome do canal</label>
                <input type="text" id="nomeCanal" name="nomeCanal">
            </div>
            <br>
            <div class='novoEmail'>
                <label for="novoEmail">Novo gênero</label>
                <input type="text" id="newGenero" name="newGenero">
            </div>
            <br>
            <div class='confirmarEmail'>
                <label for="confirmarEmail">Nova classificacao</label>
                <input type="text" id="novaClassificacao" name="novaClassificacao">
            </div>
            <br>
            
            <div class="botoes">
                <button id='alterar' class="completarAlteracao" type="submit">Salvar Alterações</button>
                <button id='cancelar' class="cancelarAlteracao" type="submit">Cancelar</button>
            </div>
        </form>
    </section>
</body>
</html>
<style>

    header {
        color: #3BB4B4;
        font-size: 2.33rem;
        padding-top: 30px;
        padding-bottom: 40px;
        margin-top: 78px;
    }

    body > section{
        margin-left: 409px;
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

    #nomeUser{
        margin-left: 52px;
        width: 562px;
    }

    #newEmail{
        margin-left: 90px;
        width: 562px;
    }

    #confirmEmail{
        margin-left: 58px;
        width: 562px;
    }

    #dataNasc{
        margin-left: 203px;
    }

    input:focus-within {
    border: 2px solid  #3BB4B4 !important;
    }

    .completarAlteracao, .cancelarAlteracao {
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
        font-size: 20px;
        background-color: rgb(182, 149, 149);
        color: #fff;
        height: 60px;
        width: 250px;
        border-radius: 15px;
        border: 0px;
        cursor: pointer;
        margin-top: 148px;
    }

    .cancelarAlteracao {
        color: rgb(182, 149, 149);
        background-color: #fff;
    }

    .botoes {
        padding-left: 130px;
    }

</style>
<script type="text/javascript">

    var botaoAlterar = document.getElementById('alterar')
    var botaoCancelar = document.getElementById('cancelar')
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

    botaoCancelar.addEventListener('click', function(){
        window.location.href = "/account" 
    })

</script>

