window.addEventListener("load", (event) => {
  const parameters  = window.location.search;
  const urlParams   = new URLSearchParams(parameters);
  let nomeContent   = urlParams.get('nome');
  nomeContent       = nomeContent.split('-');
  const nomeQuery   = nomeContent.join(' ');

  fetch('classes/realizaQuery?campos=*&where=titulo_Conteudo=' +  JSON.stringify(nomeQuery) + "&innerjoin= INNER JOIN nec_usuarios on usuario_Conteudo = idUsuario")
    .then(response => response.json()) 
    .then(data => { 
        if (data.length > 0){
            document.getElementById("containerContentBlog").style.display = "block"
            document.getElementById("titleContentBlog").innerHTML       = data[0].titulo_Conteudo;
            document.getElementById("dateTimeContentBlog").innerHTML    = new Date(data[0].data_Criacao).toLocaleDateString('pt-BR', {year: 'numeric', month: 'long', day: 'numeric'}) ;
            document.getElementById("contentBlog").innerHTML            = data[0].conteudo_artigo ;
            document.getElementById("nameAuthor").innerHTML             = data[0].nome_Usuario;
            document.getElementById("descriptionAuthor").innerHTML      = data[0].descricao_Usuario;
            document.getElementById("imgAuthor").src                    = `images/${data[0].foto_Usuario}`;
            document.getElementById("imageContentBlog").src             =  `images/content/${data[0].imagem_principal}`;
        }
        if (data.length == 0){
            document.getElementById("containerNotFoundContent").style.display = "flex"
        }
    })
})


function formatarDateTime(dataBlog){
    const data = new Date(dataBlog);
    return data.toLocaleString('pt-BR');
}


function processaFooter(){
    document.body.appendChild()
}

    