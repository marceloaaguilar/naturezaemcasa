<?php
    include_once 'classes/headerBlog.php'
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Natureza Em Casa</title>

    <!--- Bootstrap CDN-->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Style.CSS -->
    <link rel="stylesheet" href="blog.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Herr+Von+Muellerhoff&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container" id="containerBlog"> 
        <div id="containerContentBlog">
            <div class="rounded-circle d-flex justify-content-center align-items-center" id="authorBox" style="height:90px" alt="Avatar">
                    <img src="images/default-user-icon.webp" id="imgAuthor" class="fas fa-user-alt fa-3x text-info rounded-circle border"></img>
                    <div class="col d-grid m-0" id="InfosAuthor">
                            <h4 id="nameAuthor" ></h4>
                            <p id="descriptionAuthor"></p>
                    </div>
            </div>
            <h2 id="titleContentBlog"></h2>
            <p id="dateTimeContentBlog" > </p>
            <hr class="featurette-divider">
            <div id="containerFullContentBlog">
                <div id="containerImgBlog">
                    <img alt="" id="imageContentBlog" class="img-fluid">
                </div>
                <div id="contentBlog"  >
                </div>
            </div>
            <hr class="featurette-divider">
        </div>
        <div id="containerNotFoundContent">
            <h2>Ooops! Conteúdo Não Encontrado!</h2>
            <img class="img-fluid" id="img-404" src="images/img404.png">
        </div>
    </div>
    <footer style="background-color: #29503A;">
        <div class="container">
            <div class="row align-items-center p-3 text-center">
                <div class="col-md-4 footer-column">
                    <a href="/">
                        <img src="Logos/logoTransparente.png" class="img-fluid" width="40%" alt="">
                    </a>
                </div>
                <div class="col-md-4 footer-column p-3">
                    <ul class="nav flex-column" style="text-decoration:none">
                    <li>
                        <a class="nav-link" href="livros" style="color:white;">
                            Livros
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="curso" style="color:white;">
                            Curso
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="consultoria" style="color:white;">
                            Consultorias
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="" style="color:white;">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="contato" style="color:white;">
                            Contato
                        </a>
                    </li>
                    </ul>
                </div>
                <div class="col-md-4 footer-column">
                    <ul class="nav flex-column gap-3">
                        <li>
                            <a style="text-decoration: none;" href="https://www.instagram.com/_naturezaemcasa/" target="_blank" >
                                <i class="bi bi-instagram rounded-circle" style="color: #FFFFFF;">   Instagram </i>

                            </a>
                        </li>
                        <li> 
                            <a style="text-decoration: none;" href="https://www.youtube.com/@_naturezaemcasa"  target="_blank">
                                <i class="bi bi-youtube" style="color: #FFFFFF;" >  Youtube </i>
                            </a>
                        </li>
                        <li>
                            <a style="text-decoration: none;" href="https://br.pinterest.com/naturezaemcasa_/"  target="_blank">
                                <i class="bi bi-pinterest" style="color: #FFFFFF;">  Pinterest </i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="text-center"><i class="fas fa-ellipsis-h m-5"></i></div>
        </div>
    </footer>
    <script src="scriptArticle.js"></script>

</body>