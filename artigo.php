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
    
    <div class="container"> 
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
                <p id="textContentBlog" >
                </p>
            </div>
            <hr class="featurette-divider">
        </div>
    </div>
    <script src="scriptArticle.js"></script>

</body>

<?php
    include_once 'classes/footer.php';
?>