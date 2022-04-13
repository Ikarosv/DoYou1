<?php
require_once "conexao.php";
session_start();

// Pesquisando no banco por email e n por id pq a pessoa pode estar vindo do cadastro.
// E agora é seguro pesquisar por email pq vai ser único por pessoa.
if (!isset($_SESSION['id'])){
    $email = $_SESSION['email'];

    // Pegando o id do dono do email
    $cmd = "SELECT idUsuario FROM usuario WHERE email = '$email'";

    $result = mysqli_query($conn, $cmd);
    $dados = mysqli_fetch_array($result);

    $id = $dados['idUsuario'];
} else {
    $id = $_SESSION['id'];
}

// Aqui retorna a receita/lucro(total)
$cmd = "SELECT sum(valor) FROM movimentacao WHERE idUsuario = '$id' AND idTipoMov = '1'";
$query = mysqli_query($conn, $cmd);

$receita = mysqli_fetch_array($query);

// Aqui retorna as despesas(total)
$cmd = "SELECT sum(valor) FROM movimentacao WHERE idUsuario = '$id' AND idTipoMov = '2'";
$query = mysqli_query($conn, $cmd);

$despesa = mysqli_fetch_array($query);

// Troca o ponto por vírgula do resultado da subtração entre a receita e despesa
$saldo = number_format(($receita[0] - $despesa[0]), 2, ',', '.');

// BLOG

$sql = "SELECT * , date_format(data_post, '%d/%m/%Y') as data_p FROM blog ORDER BY data_post DESC";
$blogs = mysqli_query($conn, $sql);

// Retorna só despesas
$sqlD = "SELECT valor, movimentacao.idTipoMov, nome, SUM(valor) as somaValor FROM movimentacao INNER JOIN categoria ON movimentacao.idCategoria = categoria.idCategoria WHERE idUsuario = '$id' AND movimentacao.idTipoMov = '2' GROUP BY nome";

$graficoD = mysqli_query($conn, $sqlD);

//  Retorna só receitas

$sqlR = "SELECT valor, movimentacao.idTipoMov, nome, SUM(valor) as somaValor FROM movimentacao INNER JOIN categoria ON movimentacao.idCategoria = categoria.idCategoria WHERE idUsuario = '$id' AND movimentacao.idTipoMov = '1' GROUP BY nome";

$graficoR = mysqli_query($conn, $sqlR);



  


?>