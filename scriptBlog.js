window.addEventListener("load", (event) => {
    carregaConteudosBlog();
    
 })


 function carregaConteudosBlog(){

    let arrDivsContent               = document.querySelectorAll('#recent-card');
    let arrDicasJardinagem           = [];
    let arrPaisagismo                = [];
    let arrDivsDicasJardinagem       = document.querySelectorAll('#dicas-de-jardinagem-card');
    let arrDivsPaisagismo            = document.querySelectorAll('#dicas-de-paisagismo-card');

    fetch('classes/realizaQuery.php?campos=*&orderby=data_Criacao DESC&limit=10')
    .then(response => response.json()) 
    .then(json => {
        Object.values(json).forEach((value, key)=> {
            if (value.tipo_conteudo == 1){
                arrDicasJardinagem.push(value)
                document.getElementById("div-jardinagem-card").style.display= 'block';
            }
            
            if (value.tipo_conteudo == 2){
                arrPaisagismo.push(value)
                document.getElementById("div-paisagismo-card").style.display= 'block';

            }

            if (key == 0){
                document.getElementById("blogTitle").innerHTML = value.titulo_Conteudo;
                document.getElementById("blogDataAtualizacao").innerHTML = new Date(value.data_Criacao).toLocaleDateString('pt-BR', {year: 'numeric', month: 'long', day: 'numeric',});
                let image = document.getElementById("most-recent-card")
                image.style.backgroundImage = `url('/blog/images/content/${value.imagem_principal}')`
                image.style.display = 'flex'
                document.getElementById("most-recent-card-link").href = window.location.href + 'artigo?nome=' + value.diretorio_Conteudo
                return;
            }

            arrDivsContent[key - 1].querySelector("#recentCardblogTitle").innerHTML = value.titulo_Conteudo;
            let image = arrDivsContent[key - 1];
            image.style.backgroundImage = `url('/blog/images/content/${value.imagem_principal}')`;
            image.style.display = 'flex';
            arrDivsContent[key - 1].parentNode.href = '/artigo?nome=' + value.diretorio_Conteudo;

        })

        arrDicasJardinagem.forEach((element, key)=> {
            arrDivsDicasJardinagem[key].querySelector('#blogTitle').innerHTML = element.titulo_Conteudo;
            let image = arrDivsDicasJardinagem[key];
            image.style.display = 'flex'
            image.style.backgroundImage = `url('/blog/images/content/${element.imagem_principal}')`;
            arrDivsDicasJardinagem[key].parentNode.href ='/artigo?nome=' + element.diretorio_Conteudo
        })


        arrPaisagismo.forEach((element, key)=> {
            arrDivsPaisagismo[key].querySelector('#blogTitle').innerHTML = element.titulo_Conteudo;
            let image = arrDivsPaisagismo[key];
            image.style.display = 'flex'
            image.style.backgroundImage = `url('/blog/images/content/${element.imagem_principal}')`;
            arrDivsPaisagismo[key].parentNode.href ='/artigo?nome=' + element.diretorio_Conteudo
        })
    });
 }


 function retornaData(dataBlog){
    let data = new Date(dataBlog);
    return data.toLocaleDateString('pt-BR');
 }
 





