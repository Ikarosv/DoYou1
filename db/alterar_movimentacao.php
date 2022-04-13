<?php
require_once "conexao.php";

// Altera dados da movimentacao

if(isset($_REQUEST['alterar'])){
    /*

    $id = $_REQUEST['idMov'];
    $valor = $_REQUEST['valor'];
    $data = $_REQUEST['date'];
    $descricao = $_REQUEST['des'];
    $idCat = $_REQUEST['categoria'];
    $tipoMov = $_REQUEST['tm'];

    $sql = "UPDATE movimentacao SET valor = '$valor', dataMov = '$data', descricao = '$descricao', idCategoria = '$idCat', idTipoMov = $tipoMov WHERE idMovimentacao = $id";
    */

    
    
    $vlr =  str_replace('.','',$_REQUEST['valor']);
    $vlr =  str_replace(',','.',$vlr);
    $valor= (double)$vlr;

    $dataMov= $_REQUEST['date'];

    $descricao= $_REQUEST['des'];

    $idCategoria = (int)$_REQUEST['categoria'];

    $idTipoMov = (int)$_REQUEST['tm'];

    $id = $_REQUEST['idMov'];

    $sql = "UPDATE movimentacao SET valor = '$valor', dataMov = '$dataMov', descricao = '$descricao', idCategoria = '$idCategoria', idTipoMov = $idTipoMov WHERE idMovimentacao = $id";

  

    $mov = mysqli_query($conn, $sql);

    header("Location: tabela.php?tt=0");
    
}
?>