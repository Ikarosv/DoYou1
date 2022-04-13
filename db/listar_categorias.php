<?php

require_once "conexao.php";


if (isset($_REQUEST['tm'])){
        $tipoMov = $_REQUEST['tm']; 
        // Aqui retorna a receita/lucro(total)
        $sql = "SELECT * FROM categoria WHERE idTipoMov = '$tipoMov'";
        $categorias = mysqli_query($conn, $sql);

}else{
    $sql = "SELECT * FROM categoria";
    $categorias = mysqli_query($conn, $sql);
}


