<?php
    require_once "db/listar_posts.php";

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- DoYou Style -->
    <link rel="stylesheet" href="assets/css/style_header.css">
    <link rel="stylesheet" href="assets/css/style_blog.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <title>DoYou | Blog</title>
  </head>
  <body>
    <?php include_once "header.php"?>

    <div class="mt-3 container-fluid bgTitulo text-center py-1">
        <h4>Blog de notícias e dicas sobre finanças</h4>
    </div>

    

    <div class="container mb-5 bg-light">


        <!--Mostrar posts do banco de dados-->
        <div class="row">
           <?php foreach($post as $q){ ?>    
                <div class="col-12 col-lg-4 d-flex justify-content-center">
                    <div class="card bgCard text-white mt-5" style="width: 18rem;">
                       <img style="height: 200px;" src="<?php echo $q['imagem']?>" class="card-img-top" alt="<?php echo $q['alt_img']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $q['titulo'];?></h5>
                            <!--<p class="card-text"><small><?php echo substr($q['conteudo'],0,60);?>...</small></p>-->
                            <p class="card-text"><small class="text-muted font-italic"><?php echo $q['autor'] . " &nbsp &nbsp &nbsp &nbsp " . $q['data_p'];?></small></p>
                          </div>
                          <div class="card-footer text-right">
                            <a href="blog_post.php?id=<?php echo $q['idPost']?>" class="btn btn-light">Leia mais<span class="text-danger">&rarr;</span></a>
                          </div>
                        
                     </div>
                 </div>
            <?php } ?>


        </div>


    
    </div>
 
    <?php include_once "footer.php"?>
    
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    
  </body>
</html>