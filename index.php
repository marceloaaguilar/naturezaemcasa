<?php
    include_once 'classes/headerBlog.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Natureza Em Casa</title>

    <link rel="icon" type="image/x-icon" href="Logos/favNaturezaEmCasa.png">


    <!--- Bootstrap CDN-->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Style.CSS -->
    <link rel="stylesheet" href="blog.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body>
    <script src="scriptBlog.js"></script>
    <div class="container" id="posts-mais-recentes">
        <h4>Posts mais Recentes</h4>
        <div class="row">
            <div class="col-lg-6 col-sm-12" id="most-recent-card-div">
                <a id="most-recent-card-link" href="">
                    <div id="most-recent-card">
                        <div id="most-recent-card-titles">
                            <h5 id="blogTitle"></h5>
                            <p id="blogText"></p>
                            <p id="blogDataAtualizacao"></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-lg-6" id="col-row-recent-posts">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <a href="">
                            <div id="recent-card">
                                <div id="recent-card-titles">
                                    <h5 id="recentCardblogTitle"></h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-12 col-lg-6">
                        <a href="">
                            <div id="recent-card">
                                <div id="recent-card-titles">
                                    <h5 id="recentCardblogTitle" ></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <a href="">
                            <div id="recent-card">
                                <div id="recent-card-titles">
                                    <h5 id="recentCardblogTitle"></h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-12 col-lg-6">
                        <a href="">
                            <div id="recent-card">
                                <div id="recent-card-titles">
                                    <h5 id="recentCardblogTitle" ></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


            </div>
        
        </div>

        <div class="border-top my-3"></div>

        <h4>Dicas de Jardinagem</h4>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <a href="">
                    <div id="dicas-de-jardinagem-card">
                        <div id="recent-card-titles">
                            <h5 id="blogTitle"></h5>
                            <p id="blogText"></p>
                            <p id="blogDataAtualizacao"></p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-12 col-lg-6">
                <a href="">
                    <div id="dicas-de-jardinagem-card">
                        <div id="recent-card-titles">
                            <h5 id="blogTitle"></h5>
                            <p id="blogText"></p>
                            <p id="blogDataAtualizacao"></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <a href="">
                    <div id="dicas-de-jardinagem-card">
                        <div id="recent-card-titles">
                            <h5 id="blogTitle"></h5>
                            <p id="blogText"></p>
                            <p id="blogDataAtualizacao"></p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-12 col-lg-6">
                <a href="">
                    <div id="dicas-de-jardinagem-card">
                        <div id="recent-card-titles">
                            <h5 id="blogTitle"></h5>
                            <p id="blogText"></p>
                            <p id="blogDataAtualizacao"></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="border-top my-3"></div>
        <h4>Dicas de Paisagismo</h4>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <a href="">
                    <div id="dicas-de-paisagismo-card">
                        <div id="recent-card-titles">
                            <h5 id="blogTitle"></h5>
                            <p id="blogText"></p>
                            <p id="blogDataAtualizacao"></p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-12 col-lg-6">
                <a href="">
                    <div id="dicas-de-paisagismo-card">
                        <div id="recent-card-titles">
                            <h5 id="blogTitle"></h5>
                            <p id="blogText"></p>
                            <p id="blogDataAtualizacao"></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <a href="">
                    <div id="dicas-de-paisagismo-card">
                        <div id="recent-card-titles">
                            <h5 id="blogTitle"></h5>
                            <p id="blogText"></p>
                            <p id="blogDataAtualizacao"></p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-12 col-lg-6">
                <a href="">
                    <div id="dicas-de-paisagismo-card">
                        <div id="recent-card-titles">
                            <h5 id="blogTitle"></h5>
                            <p id="blogText"></p>
                            <p id="blogDataAtualizacao"></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="border-top my-3"></div>
</body>

<?php
    include_once 'classes/footer.php';
?>