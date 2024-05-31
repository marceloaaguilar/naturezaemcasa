var table;
var idContent;
let newEditor;

window.addEventListener("load", (event) => {
   carregaTabelaConteudos();
   DecoupledEditor
   .create( document.querySelector( '#editor' ), {
    ckfinder:{
        uploadUrl: 'classes/fileupload.php'
    }
   })
   .then( editor => {
    const toolbarContainer = document.querySelector( '#toolbar-container' );
    toolbarContainer.appendChild(editor.ui.view.toolbar.element);
    newEditor = editor;
} )
   .catch( error => {
       console.error( error );
   } );
   
})

let myModal = new bootstrap.Modal(document.getElementById('cadastrarConteudo'));


var cadastrarBtn = document.getElementById("cadastrarBtn");
    cadastrarBtn.addEventListener('click', function(){
    
})

var salvarBtn = document.getElementById("salvar");
    salvarBtn.addEventListener('click', function(){
    let txt = document.getElementById("modalText").innerHTML;
    salvarArtigo(idContent);
})


var fecharBtn = document.getElementById("fechar");
    fecharBtn.addEventListener('click', function(){
        carregaTabelaConteudos();
})

var fecharIcon = document.getElementById("btnFechar");
    fecharIcon.addEventListener('click', function(){
    carregaTabelaConteudos();
})

function carregaTabelaConteudos() {
    fetch('classes/class_conteudos.php')
    .then((response) => response.json())
    .then((data)=> {
        table = new Tabulator("#content-table", {   
            data: data,                //load row data from array
            layout:"fitColumns",      //fit columns to width of table
            responsiveLayout:"hide",  //hide columns that don't fit on the table
            addRowPos:"top",          //when adding a new row, add it to the top of the table
            history:true,             //allow undo and redo actions on the table
            pagination:"local",       //paginate the data
            paginationSize:7,         //allow 7 rows per page of data
            paginationCounter:"rows", //display count of paginated rows in footer
            movableColumns:true,      //allow column order to be changed
            initialSort:[             //set the initial sort order of the data
                {column:"data_Criacao"},
            ],
            columnDefaults:{
                tooltip:true,         //show tool tips on cells
            },
            columns:[                 //define the table columns
                {title:"Código", field:"sequencial_Conteudo", width:95, },
                {title:"Título", field:"titulo_Conteudo", hozAlign:"left"},
                {title:"Texto", field:"texto_Conteudo", hozAlign:"left", cellClick:function(e, cell){
                    
                    var cell2 = cell.getRow(cell);
                    var txt = cell2.getData().texto_Conteudo;
                    idContent = cell2.getData().sequencial_Conteudo;
                    expandeTexto(txt);
                }},
                {title: "Imagem", field:"imagem_Conteudo", hozAlign:"left", cellClick:function(e,cell){
                    var row         = cell.getRow(cell);
                    idContent       = row.getData().sequencial_Conteudo;
                    let diretorio   = row.getData().imagem_Conteudo;
                    var img = document.getElementById("imgConteudo");
                    var modalImg = document.getElementById("modalImg");
                    modalImg.style.display = "flex"
                    img.src = "images/" + diretorio;
                    
                }
                },
                {title:"Data de Criação", field:"data_Criacao"}
            ],
        });
    });

}


function expandeTexto(txt){
    $("#btnModal").trigger("click");
    document.getElementById("modalText").innerText =txt;
    
}


function salvarArtigo(idContent){

    var formData = new FormData();
    formData.append("metodo", "update");
    formData.append("conteudo", $("#modalText").val());
    formData.append("campo", "texto_Conteudo");
    formData.append("where", " sequencial_Conteudo = " +  idContent);
 
    fetch('classes/realizaQuery.php', {
        method: "POST",
        body: formData
      })
      .then(response => response.json()) 
      .then(json => {
        alertSucess("Artigo salvo com sucesso!");
        carregaTabelaConteudos();
      });
    
    
   
  

}


let formCadastroDeConteudo = document.getElementById("formCadastroDeConteudo");
formCadastroDeConteudo.addEventListener("submit", function(e){
    e.preventDefault();
    let title           = document.getElementById("titulo").value; 
    let imgPrincipal    = document.getElementById("imagemPrincipal").files[0];
    let typeContent     = document.getElementById("tipoConteudo").value;
    

    var formData = new FormData();
    formData.append("imgPrincipal", imgPrincipal);
    formData.append("titulo",  title);
    formData.append("tipoConteudo",  typeContent);
    formData.append("metodo", "processaCadastroConteudo");
    formData.append("editorData", newEditor.getData());

    Swal.fire({
    title: "Processando...",
    timerProgressBar: true,
    didOpen: () => {
        Swal.showLoading();
    }
    })

    fetch('classes/realizaQuery', {
        method: "POST",
        body: formData
      })
      .then(response => response.json()) 
      .then(data => {
        Swal.close();
          if(data == true){
            Swal.fire({
                title: 'Conteúdo cadastrado com sucesso',
                toast: true,
                icon: 'success',
              });
            myModal.hide();
            carregaTabelaConteudos();
          }

      });
})

let btnFecharModalImg = document.getElementById("modalImgCloseIcon");
btnFecharModalImg.addEventListener('click', function(){
    var modalImg = document.getElementById("modalImg");
    modalImg.style.display = "none"

});

let title = document.getElementById("titulo");
title.addEventListener("change", function() {
    if (title.value.includes('-' )){
        Swal.fire({
            title: 'Não são permitidos caracteres especiais no título do conteúdo!',
            toast: true,
            icon: 'error',
          });
        title.value = '';
    }

    let directory = title.value.replaceAll(' ', '-');
    fetch('classes/realizaQuery?campos=*&where=diretorio_Conteudo=' +  "'" +  directory + "'")
    .then(response => response.json()) 
    .then(existeTitulo => { 
        if (existeTitulo.length > 0){
            Swal.fire({
                title: 'Já existe um conteúdo com esse título!',
                toast: true,
                icon: 'error',
              });
            title.value = '';
        }
    })

})