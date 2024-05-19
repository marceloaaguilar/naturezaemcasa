window.addEventListener("load", (event) => {
    carregaConteudosBlog();
    
 })


 function carregaConteudosBlog(){

    let arrDivsContent      = document.querySelectorAll('#recent-card');
    let arrDicasJardinagem  = [];
    let arrPaisagismo       = [];
    let arrDivsDicasJardinagem       = document.querySelectorAll('#dicas-de-jardinagem-card');
    let arrDivsPaisagismo            = document.querySelectorAll('#dicas-de-paisagismo-card');

    fetch('classes/realizaQuery.php?campos=*&orderby=data_Criacao DESC&limit=10')
    .then(response => response.json()) 
    .then(json => {
        Object.values(json).forEach((value, key)=> {
            if (value.tipo_conteudo == 1){
                arrDicasJardinagem.push(value)
            }

            if (value.tipo_conteudo == 2){
                arrPaisagismo.push(value)
            }

            if (key == 0){
                document.getElementById("blogTitle").innerHTML = value.titulo_Conteudo;
                document.getElementById("blogText").innerHTML = value.texto_Conteudo;
                document.getElementById("blogDataAtualizacao").innerHTML = value.data_Criacao;
                let image = document.getElementById("most-recent-card")
                image.style.backgroundImage = `url(data:image/png;base64,${value.imagem_principal})`
                image.style.display = 'flex'
                document.getElementById("most-recent-card-link").href = window.location.href + '/artigo?nome=' + value.diretorio_Conteudo
                return;
            }

            arrDivsContent[key - 1].querySelector("#recentCardblogTitle").innerHTML = value.titulo_Conteudo;
            let image = arrDivsContent[key - 1];
            image.style.backgroundImage = `url(data:image/png;base64,${value.imagem_principal})`;
            image.style.display = 'flex';
            arrDivsContent[key - 1].parentNode.href = '/artigo?nome=' + value.diretorio_Conteudo;




    })

    arrDicasJardinagem.forEach((element, key)=> {
        arrDivsDicasJardinagem[key].querySelector('#blogTitle').innerHTML = element.titulo_Conteudo;
        arrDivsDicasJardinagem[key].querySelector('#blogText').innerHTML = element.texto_Conteudo;
        arrDivsDicasJardinagem[key].querySelector('#blogText').innerHTML = element.texto_Conteudo;
        let image = arrDivsDicasJardinagem[key];
        image.style.display = 'flex'
        image.style.backgroundImage = `url(data:image/png;base64,${element.imagem_principal})`;
        arrDivsDicasJardinagem[key].parentNode.href ='/artigo?nome=' + element.diretorio_Conteudo
    })


    arrPaisagismo.forEach((element, key)=> {
        arrDivsPaisagismo[key].querySelector('#blogTitle').innerHTML = element.titulo_Conteudo;
        arrDivsPaisagismo[key].querySelector('#blogText').innerHTML = element.texto_Conteudo;
        arrDivsPaisagismo[key].querySelector('#blogText').innerHTML = element.texto_Conteudo;
        let image = arrDivsPaisagismo[key];
        image.style.display = 'flex'
        image.style.backgroundImage = `url(data:image/png;base64,${element.imagem_principal})`;
        arrDivsDicasJardinagem[key].parentNode.href ='/artigo?nome=' + element.diretorio_Conteudo
    })
    });
 }


 function retornaData(dataBlog){
    let data = new Date(dataBlog);
    return data.toLocaleDateString('pt-BR');


 }
 





