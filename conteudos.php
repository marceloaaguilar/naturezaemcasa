<?php
       session_start();    
          if(!((isset($_SESSION['usuario']) && isset($_SESSION['senha'])))){
              header('Location: login');die;
          }
            
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Conteúdo -  Natureza Em Casa</title>
    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
    <link href="https://unpkg.com/tabulator-tables@5.5.2/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>

    <!--- Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <link rel="stylesheet" href="blog.css">

    <!-- Bootstrap ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <!-- Button trigger modal -->
    <button type="button" style="display:none" id="btnModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarArtigo">
    </button>
    <div class="modal" tabindex="-1" id ="editarArtigo">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Artigo</h5>
                <button type="button" class="btn-close" id="btnFechar" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <textarea id="modalText" >Modal body text goes here.</textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" id="fechar" data-bs-dismiss="modal">Fechar</button>
                <button type="button" id="salvar" class="btn">Salvar Artigo</button>
            </div>
            </div>
        </div>
    </div>
    <div class="container text-center mt-5" id="divCentral">
        <h3>Cadastro de Contéudos - Blog Natureza Em Casa</h3>
        <div id="content-table" class="mt-3"></div>
        
        <div class="container mt-5" >
            <button type="button" class="btn btn-primary" id="cadastrarBtn" data-bs-toggle="modal" data-bs-target="#cadastrarConteudo" >Cadastrar Conteúdo</button>
        </div>
    
        <div class="alert alert-success m-0" id="alert-sucess" role="alert"> 
            <p id="alert-text"  >Alert Text...</p>
        </div>
    </div>
    <div class="modal " tabindex="-1" id ="cadastrarConteudo">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastrar Conteúdo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formCadastroDeConteudo" >
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Título</label>
                                    <input type="text" class="form-control" id="titulo"> 
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Selecione o Tipo de Conteúdo</label>
                                    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="tipoConteudo">
                                        <option value='1'>Dicas de Jardinagem</option>
                                        <option value='2'>Paisagismo</option>
                                        <option value='3'>Outros</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="imagem" class="form-label">Imagem Principal</label>
                                    <input type="file" accept="image/jpeg, image/png, image/jpg" class="form-control" id="imagemPrincipal"> 
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="imagem" class="form-label">Imagem Cabeçalho</label>
                                    <input type="file" accept="image/jpeg, image/png, image/jpg" class="form-control" id="imagemCabecalho"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="imagem" class="form-label">Imagem Corpo</label>
                                    <input type="file" accept="image/jpeg, image/png, image/jpg" class="form-control" id="imagemCorpo"> 
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="imagem" class="form-label">Imagem Rodapé</label>
                                    <input type="file" accept="image/jpeg, image/png, image/jpg" class="form-control" id="imagemRodape"> 
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="artigo" class="form-label"> Texto </label>
                            <textarea class="form-control" id="artigo" rows="10"></textarea>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" id="salvar" class="btn">Cadastrar Artigo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modalImg" class="container">
            <button class="bi bi-x" id="modalImgCloseIcon"></button>
            <img src="" alt="" id="imgConteudo">
    </div>



    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>