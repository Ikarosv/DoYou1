<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoYou | Controle Financeiro</title>

    <!-- DoYou Style -->
    <link rel="stylesheet" href="assets/css/style_header.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <style>
        #carouselExampleCaptions {
            border-radius: 100% !important;
            color: #00d863;
        }
    </style>
</head>
<body>
    <!-- CABEÇALHO -->
        <?php include_once "header.php"; ?>
    <!--  -->

    <!-- CARROSSEL 
        <img src="assets/img/ft1.png" class="img-fluid" alt="">-->
       
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php require_once "db/listar_posts.php";
                $cont = 0;
                foreach ($post as $c){ ?>
                <li data-target="#carouselExampleCaptions" data-slide-to="$cont" class="active"></li>
                <?php $cont++; } ?>
            </ol>
       
            <div class="carousel-inner">
                <?php
                $contador = 0;
                foreach($post as $c){ 
                $contador ++;
                if($contador == 1) { ?>
                    <div class="carousel-item active">
                <?php } else { ?>
                    <div class="carousel-item">
                <?php } ?>
                        <img src="<?php echo $c['imagem'] ?>" class="d-block w-100" style="height: 550px;" alt="<?php echo $c['alt_img'] ?>">
                        <div class="carousel-caption d-none  d-md-block">
                            <h5 style="color: white; background-color: #00d863; font-size: 20pt; border-radius: 2rem;" class="w-100 py-1 px-2"><?php echo $c['titulo'] ?> </h5>
                        </div>
                    </div>
                <?php } ?>
            </div>
        
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    <!--  -->

    <h3 class="w-100 my-5 py-1 h3DoYou text-center">Sobre nós</h3>

    <section class="container d-flex text-center justify-content-center">
        <div class="row justify-content-md-around flex-md-row flex-column w-100">
            <div class="texto-sobre mb-3">
                <h5 class="d-inline-block px-3 py-1">Missão</h5>
                <h4>Promover a educação<br>financeira</h4>
            </div>
            <div class="texto-sobre mb-3">
                <h5 class="d-inline-block px-3 py-1">Serviços</h5>
                <h4>Finaceiros</h4>
            </div>
            <div class="texto-sobre mb-3">
                <h5 class="d-inline-block px-3 py-1">Industria</h5>
                <h4>Serviços Finaceiros</h4>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
        <?php include_once "footer.php" ?>
    <!--  -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script>
        $('.carousel').carousel({
        interval: 3000,
        pause: false
        })
    </script>
</body>
</html>