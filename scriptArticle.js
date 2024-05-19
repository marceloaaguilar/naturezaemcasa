window.addEventListener("load", (event) => {
  const parameters  = window.location.search;
  const urlParams   = new URLSearchParams(parameters);
  let nomeContent   = urlParams.get('nome');
  nomeContent       = nomeContent.split('-');
  const nomeQuery   = nomeContent.join(' ');

  fetch('classes/realizaQuery?campos=*&where=titulo_Conteudo=' +  JSON.stringify(nomeQuery) + "&innerjoin= INNER JOIN nec_usuarios on usuario_Conteudo = idUsuario")
    .then(response => response.json()) 
    .then(data => { 
        document.getElementById("titleContentBlog").innerHTML       = data[0].titulo_Conteudo;
        document.getElementById("dateTimeContentBlog").innerHTML    = data[0].data_Criacao ;
        document.getElementById("textContentBlog").innerHTML        = data[0].texto_Conteudo ;
        document.getElementById("nameAuthor").innerHTML             = data[0].nome_Usuario;
        document.getElementById("descriptionAuthor").innerHTML      = data[0].descricao_Usuario;
        document.getElementById("imgAuthor").src                    = `images/${data[0].foto_Usuario}`;
        document.getElementById("imageContentBlog").src             =  `data:image/png;base64,${data[0].imagem_cabecalho}`;
    })


})


function formatarDateTime(dataBlog){
    const data = new Date(dataBlog);
    return data.toLocaleString('pt-BR');
}


function processaFooter(){
    $footer = 

    document.body.appendChild()
}

    