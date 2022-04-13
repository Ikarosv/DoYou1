<?php
require_once "conexao.php";

if (!isset($_SESSION['nome'])){
    session_start();
}

// Se já existe id...
if (isset($_SESSION['id'])){

    $id = $_SESSION['id'];

} elseif (isset($_SESSION['email'])) {
    // Pesquisando no banco por email e n por id pq a pessoa pode estar vindo do cadastro.
    // E agora é seguro pesquisar por email pq vai ser único por pessoa.
    $email = $_SESSION['email'];

    // Pegando o id do dono do email
    $cmd = "SELECT idUsuario FROM usuario WHERE email = '$email'";

    $result = mysqli_query($conn, $cmd);
    $dados = mysqli_fetch_array($result);

    $id = $dados['idUsuario'];
}

// Se a variavel id estiver setada...
if (isset($id)) {
    // Aqui retorna a receita/lucro(total)
    $cmd = "SELECT sum(valor) FROM movimentacao WHERE idUsuario = '$id' AND idTipoMov = '1'";
    $r = mysqli_query($conn, $cmd);

    $receita = mysqli_fetch_array($r);

    // Aqui retorna as despesas(total)
    $cmd = "SELECT sum(valor) FROM movimentacao WHERE idUsuario = '$id' AND idTipoMov = '2'";
    $d = mysqli_query($conn, $cmd);

    $despesa = mysqli_fetch_array($d);

    // Receita menos despesa
    $total = $receita[0] - $despesa[0];

    // Troca o ponto por vírgula do resultado da subtração entre a receita e despesa
    $saldo = number_format($total, 2, ',', '.');
}
?>