<?php 

require_once "db/db_graficos.php";
if (!isset($_SESSION['nome'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoYou | Geral</title>
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <!-- DoYou style -->
    <link rel="stylesheet" href="assets/css/style_inicio.css">
    <link rel="stylesheet" href="assets/css/style_header.css">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  
    <!-- Grafico -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.load("visualization","1", {packages:['corechart']});
        //chamada da função
        google.setOnLoadCallback(drawChart);

        //função para montar o gráfico
        function drawChart(){
        //variável matriz
        var data =google.visualization.arrayToDataTable([
            ['Entradas e Saídas', 'R$', { role: 'style' } ],
            ['Receitas', <?php echo $rece[0]?>, 'color: blue'],
            ['Despesas', <?php echo $desp[0]?>, 'color: red'],
            
        ]);
        //opções 
        var options ={title: 'Entradas e Saídas do Mês',
            viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
                    };
        //cria objeto pieChart e recebe por parâmetro a div onde será exibido
        var barras = new google.visualization.BarChart(document.getElementById('barras_div'));
        //criar o desenho
        barras.draw(data,options);
        }

        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawColColors);

        function drawColColors() {
     
		var data = google.visualization.arrayToDataTable([
         ['Categoria', 'R$'],

         <?php foreach ($graf as $g){ ?>

            ['<?php echo $g['nome']?>', <?php echo $g['somaValor'] ?>],

            <?php } ?>
        ]);
       var options = {
        title: 'Despesas por Categorias',
        colors: ['#9575cd', '#33ac71'],
        hAxis: {
          title: 'Categorias',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Valores gastos'
        }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('graf'));
      chart.draw(data, options);
    }
        </script>
    <!--  -->
</head>
<body>
    <!-- Header -->
        <?php include_once "header.php";

        if (!$_SESSION['nome']){
            header('location: login.php');
            exit();
        }
        ?>


    <!-- AREA 1 = Acesso rápido -->
        <div class="d-flex container flex-column bgPerso my-4 p-3">
            <div class="d-flex flex-md-nowrap flex-wrap">
            <div class="order-md-0 order-2 flex-fill d-flex justify-content-between mr-2 mt-1 align-items-center">
               
                <div class="d-flex border border-success rounded py-4 px-2">
                    <h5 class="mb-0 mx-1"> <strong class="DoYou">Saldo:</strong></h5>
                    <h5 class="mb-0">R$ <?php echo $saldo; ?> </h5>
                </div>
                <h5 class="mb-0 mx-1"> <strong class="DoYou">Inserir</strong></h5>
            </div>
            <div class="order-md-0 order-1 borda-left pl-md-2 py-1 d-block d-flex mb-2">
            <a href="form.php?tm=1" data-toggle="tooltip" data-placement="bottom" title="Adicionar receita" class="btn btnPerso">
                    <svg xmlns="http://www.w3.org/2000/svg" height="43px" viewBox="0 0 24 24" width="43px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4V7zm-1-5C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                    <h6>Receita</h6>
                </a>
                <a href="form.php?tm=2" data-toggle="tooltip" data-placement="bottom" title="Adicionar despesa" class="btn btnPerso">
                    <svg xmlns="http://www.w3.org/2000/svg" height="43px" viewBox="0 0 24 24" width="43px" fill="#ff6c6c">
                        <path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 11v2h10v-2H7zm5-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                    </svg>
                    <h6>Despesa</h6>
                </a>
              <!--
                <a href="tabela.php?tt=0" data-toggle="tooltip" data-placement="bottom" title="Ver relatórios" class="btn btnPerso">
                    <svg xmlns="http://www.w3.org/2000/svg" height="43px" viewBox="0 0 24 24" width="43px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H8V4h12v12zM10 9h8v2h-8zm0 3h4v2h-4zm0-6h8v2h-8z"/></svg>
                    <h6>Relatórios</h6>
                </a>
              -->
            </div>
            </div>
            <!-- NAV DE TABELAS -->
                <div class="justify-content-center w-100 mt-3">
                    <nav class="nav myNav nav-tabs justify-content-md-center">
                        <a href="inicio.php" class="nav-link">Início</a> 
                        <a href="tabela.php?tt=0" class="nav-link">Geral</a>
                        <a href="tabela.php?tt=1" class="nav-link">Receitas</a>
                        <a href="tabela.php?tt=2" class="nav-link">Despesas</a>
                    
                        <a href="grafico.php" class="nav-link">Gráficos</a>
                       
                       
                    </nav>
                </div>
            <!--  -->
        </div>
    <!--  -->
    
     <!-- AREA 2 = GRAFICOS -->
     <div class="d-flex flex-md-nowrap flex-wrap container mb-4 p-0">
            <!-- Grafico1 -->
            <div class="d-flex flex-column bgPerso p-3 mr-md-4">
               
                <div id="barras_div" class="w-100 h-100"></div>
                
        
            </div>
            <!-- Grafico2 -->
            <div class="d-flex container mt-md-0 mt-4 flex-column bgPerso p-3">
                <div id="graf" class="w-100 h-100"> </div>
            </div>
        </div>
    <!--  -->

    <!-- Footer -->
        <?php include_once "footer.php" ?>
    <!--  -->

    <!-- Js Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>