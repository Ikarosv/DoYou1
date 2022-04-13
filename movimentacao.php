<?php
  require_once "db/visualizar_movimentacao.php";
  require_once "db/listar_categorias.php";
  require_once "db/alterar_movimentacao.php";
  require_once "db/excluir_movimentacao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoYou | Visualizar Movimentação</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/form_style.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Lato&family=Nunito+Sans:wght@300;400;700&display=swap');
    	body{
        font-family: "Lato", sans-serif;
        background: url('assets/img/fundo-verde.png');
        background-size: 100%;
        border-radius: 1em;
      }
      @media screen and (min-width: 512px) {
        
        form {
          max-width: 500px;
        }
      }
    </style>
</head>


 
    <body class="mt-5 mb-5">

      <form  method="POST" style="background-color: #a7acb1;">
        
          
        <?php if(isset($mov)){
        foreach($mov as $m){ ?>
        <h3>Movimentação Nº <?php echo $m['idMovimentacao']?>
        <?php if(isset($_REQUEST['tm'])){
         if($_REQUEST['tm']==1){?>
         - Receita</h3>
        <?php } else { ?>
          - Despesa</h3>
        <?php } }?>
        <fieldset>
        <label for="categoria">Categoria:</label>
          <select id="categoria" name="categoria">
              <option value="<?php echo $m['idCategoria']?>" selected><?php echo $m['nome']?></option>
          <?php foreach($categorias as $c) {?>
              <option value="<?php echo $c['idCategoria']?>"><?php echo $c['nome']?></option>
            <?php } ?>
          </select>

        <label for="des">Descrição:</label>
          <textarea id="des" name="des"><?php echo $m['descricao']?></textarea>

        <label for="date">Data:</label>
        <input type="date" id="date" name="date" value="<?php echo $m['dataMov']?>">

        <label for="valor">Valor: R$</label>
        <input type="text" id="valor" name="valor" onkeypress="$(this).mask('#.###.##0,00', {reverse: true})" value="<?php echo str_replace('.',',',$m['valor'])?>">

        <?php }} else {
          header('location: tabela.php');
        }?>
        </fieldset>
          
        <div class="form-row justify-content-center mt-4">
        <div class="form-group  col-md-4 mt-2">                  
            <input type="text" hidden value="<?php echo $m['idMovimentacao']?>" name="idMov">
            <button class="form-control btn btn-info mt-2" name="alterar">Alterar</button>
            <button class="form-control btn btn-danger mt-2" name="excluir">Excluir</button>
           
            <a href="tabela.php?tt=0" class="form-control btn btn-light mt-2">Voltar</a>
            
        </div>
        </div>
        
      </form>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    </body>
</html>