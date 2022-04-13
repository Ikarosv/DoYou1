<?php
require_once "conexao.php";

// Excluir movimentaçao

if(isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idMov'];

    $sql = "DELETE FROM movimentacao WHERE idMovimentacao = '$id'";

    mysqli_query($conn, $sql);

    header("Location: tabela.php?tt=0");

}