<?php 
    print_r($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post" class='oi'>
        <legend>Gêneros</legend>
        <label for="generoEsporte">Esporte</label>
        <input  type="checkbox" id="generoEsporte" name="generos[]" value='esporte'>
        <label for="generoMusical">Musical</label>
        <input type="checkbox" id="generoMusical" name="generos[]" value='musical'>
        <label for="generoJogos">Jogos</label>
        <input  type="checkbox" id="generoJogos" name="generos[]" value='jogos'>
        <button type="submit"></button>
    </form>
</body>
</html>
<style>
    .oi {
        height: 100vh;
    }
</style>