<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            ['Receitas', 1000, 'color: blue'],
            ['Despesas', 800, 'color: red'],
            
        ]);
        //opções 
        var options ={title: 'Entradas e Saídas',
                    
                    };
        //cria objeto pieChart e recebe por parâmetro a div onde será exibido
        var barras = new google.visualization.BarChart(document.getElementById('barras_div'));
        //criar o desenho
        barras.draw(data,options);
        }
        </script>
</head>
<body>
    <div id="barras_div" style="width: 500px; height:400px;"></div>
</body>
</html>