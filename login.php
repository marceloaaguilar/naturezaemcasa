
<?php
?>

<!DOCTYPE html>
   <html lang="pt-BR">
    <head>

        <!-- Link CSS !-->
        <link rel="stylesheet" href="style.css">

         <!--- Bootstrap CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- Bootstrap Icons CDN-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
    </head>


    <body>
        <div class="container" id="containerFormLoginBlog">
            <label id="formTitle" for="">Login Blog Natureza em Casa</label>
            <form action="classes/processaLogin" id="formLoginBlog" method="POST"  enctype="multipart/form-data"> 
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuário</label>
                    <input type="text" name="usuario" class="form-control" id="usuario">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha">
                </div>
                <button type="submit" id="btnLogin" name="btnLogin" data-action='submit' class="btn btn-primary">Entrar</button>
            </form>
        </div>


    </body>


</html>





