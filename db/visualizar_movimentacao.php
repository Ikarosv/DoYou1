<?php
require_once "conexao.php";

// Retorna post do banco por id

if(isset($_REQUEST['idMov'])){
    $id = $_REQUEST['idMov'];

    $sql = "SELECT m.idMovimentacao, m.valor, date_format(m.dataMov, '%Y-%m-%d') as dataMov, m.descricao, m.idCategoria, m.idTipoMov, c.nome 
            FROM movimentacao as m 
            INNER JOIN categoria as c 
            WHERE m.idMovimentacao = $id AND m.idCategoria = c.idCategoria";

    $mov = mysqli_query($conn, $sql);

}
?>