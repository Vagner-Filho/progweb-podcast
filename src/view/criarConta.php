<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">

    <title>Criar Conta</title>
</head>
<body>
    <section>
        <form action='/criarConta' name="cadastro" id="form" method="POST">
            <header>
                <div class='nome'>
                    <h1> Criar conta </h1>
                </div>
            </header>
            <?php include(__DIR__.'/alert.php') ?>
            <div class="first-line">
                <div>
                    <label for="nome-usuario">Nome de Usuário</label>
                    <input type="text" id="nome-usuario" name="nome-usuario" required>
                </div>
                <div>
                    <label for="nome-canal">Nome do Canal</label>
                    <input type="text" id="nome-canal" name="nome-canal" required>
                </div>
            </div>
            <div class='second-line'>
                <div>
                    <label for="data-nascimento">Data de Nascimento</label>
                    <input type="date" id="data-nascimento" name="data-nascimento" min='1900-01-01' required>
                </div>
                <div>
                    <label for="descricao-episodio">Descrição</label>
                    <textarea id="descricao-episodio" name="descricao-episodio" required></textarea>
                </div>
            </div>
            <div class='third-line'>
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="genero">Gênero</label>
                    <input list='generos' type="text" id="genero" name="genero" required>
                </div>
            </div>
            <div class='fourth-line'>
                <div>           
                    <label for="senha">Senha</label>
                    <input type="text" id="senha" name="senha" required>
                </div>
                <div>
                    <label for="classificacao">Classificação</label>
                    <input type="text" id="classificacao" name="classificacao" required>
                </div>
            </div>
            <div class="criar">
                <button id="criar" type="submit">Criar conta</button>
            </div>
        </form>
    </section>
        
   
</body>
</html>
<style>

    body {
        font-family: 'Inter', sans-serif;
        font-weight: bolder;
    }

    div {
        display: flex;
        margin-bottom: 35px;
    }

    div > div {
        padding-right: 5%;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    div > div:nth-child(1) {
        padding-right: 8%;
        padding-left: 8%;
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

    .voltar {
    }

    
    @media (max-width: 695px) {
        
        body {
            margin: 0% 10%;
        }

        .nome {
            display: flex;
            justify-content: center;
        }
        
        div {
            display: block;
        }

        div > div:nth-child(1) {
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