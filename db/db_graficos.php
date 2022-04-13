<?php 

    require_once "conexao.php";
    session_start();

  
    if (isset($_SESSION['id'])){

    $id = $_SESSION['id'];
    
    $agora = getdate();
    $mes = $agora['mon'];
    $ano = $agora['year'];

    $sql = "SELECT sum(valor) FROM movimentacao WHERE idUsuario = '$id' AND idTipoMov = '1' AND Month(dataMov) = '$mes' AND Year(dataMov) = '$ano'";
    $query1 = mysqli_query($conn, $sql);
    $rece = mysqli_fetch_array($query1);
        
    // Aqui retorna as despesas(total)
    $sql = "SELECT sum(valor) FROM movimentacao WHERE idUsuario = '$id' AND idTipoMov = '2' AND Month(dataMov) = '$mes' AND Year(dataMov) = '$ano'";
    $query2 = mysqli_query($conn, $sql);
    $desp = mysqli_fetch_array($query2);
    

    // Troca o ponto por vírgula do resultado da subtração entre a receita e despesa
    $res = number_format(($rece[0] - $desp[0]), 2, ',', '.');

    $sqlD = "SELECT valor, movimentacao.idTipoMov, nome, SUM(valor) as somaValor FROM movimentacao INNER JOIN categoria ON movimentacao.idCategoria = categoria.idCategoria WHERE idUsuario = '$id' AND movimentacao.idTipoMov = '2' GROUP BY nome";

    $graf = mysqli_query($conn, $sqlD);
    }




?>