class searchBar extends HTMLElement {
  constructor() {
      super();
      const shadow = this.attachShadow({ mode: 'open' });
      const barMarkUp = document.createElement('bar')

      barMarkUp.innerHTML = `
      <head>
          <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">

      </head>
      <div class="barra-pesquisa">
          <input id="search-input" type="text" placeholder="Pesquisar"/>
          <button onclick="searchEpisode()"> Buscar 
              <img src="../searchBar/searchItem.svg">
          </button>
      </div>
      `;

      const style = document.createElement('style');
      style.textContent = `
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
        border: 1px solid  #3BB4B4 !important;
        background-color: rgb(224, 222, 222);
      }
    
      .barra-pesquisa:hover {
        border: 1px solid #3BB4B4;
        background-color: rgb(224, 222, 222);
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
      `;

      const script = document.createElement('script');
      script.textContent = `
        function searchEpisode() {
          const shadow = document.getElementsByTagName('search-bar')
          const input = shadow[0].shadowRoot.querySelector('#search-input').value
          console.log(input)
          if (input) {
            const episodesFilter = episodesArray.filter(episode => episode.nome.includes(input))
            return episodesFilter
          } else {
            const episodesFilter = espisodesArray
            return episodesFilter
          }
        }
      `

      shadow.appendChild(barMarkUp);
      shadow.appendChild(style);
      shadow.appendChild(script);
  }
}

customElements.define('search-bar', searchBar);