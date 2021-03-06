<head>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">

</head>
<div class="barra-pesquisa">
  <input type="text" placeholder="Pesquisar" />
  <button type="submit"> Buscar 
    <img src="src/searchBar/searchItem.svg">
  </button>
</div>

<style>
  .barra-pesquisa {
    display: flex;
    flex-direction: row;
    font-family: 'Inter', sans-serif;
    font-weight: bolder;
    position: relative;
    outline: none;
    width: 500px;
    height: 35px;
    border-radius: 25px;
    background-color: #E5E5E5;
    border: 0px;
    align-content: center;
    align-items: center;
    margin: auto;
  }

  .barra-pesquisa input {
    font-family: 'Inter', sans-serif;
    font-weight: bolder;
    width: 100%;
    height: 100%;
    border-radius: 25px;
    border: 0 !important;
    background: unset;
    padding: 0px 20px;
    outline: none;
    
  }

  .barra-pesquisa:focus-within {
    border: 2px solid  #3BB4B4 !important;
    background-color: rgb(224, 222, 222);
  }

  .barra-pesquisa:hover {
    border: 1px solid #3BB4B4;
    background-color: rgb(224, 222, 222);
    margin-bottom: -2px;
  }

  .barra-pesquisa button {
    font-family: 'Inter', sans-serif;
    font-weight: bolder;
    display: inline-flex;
    height: 31px;
    width: 84px;
    border-radius: 25px;
    background-color: rgb(187, 184, 184);
    border: 0px;
    color:rgb(253, 253, 253);
    padding-top: 7px;
    padding-left: 13px;
    cursor: pointer;
    position: relative;
    right: 2px;
  }

  .barra-pesquisa button:hover {
    background-color: rgb(167, 164, 164);
  }

  .barra-pesquisa button > img {
    height: 20px;
    width: 20px;
  }

  @media (max-width: 600px) {
    .barra-pesquisa {
      width: 100%;
    }
  }

</style>

