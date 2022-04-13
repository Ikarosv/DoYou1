<?php
require_once "conexao.php";

// Retorna post do banco por id

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql = "SELECT * , date_format(data_post, '%d/%m/%Y') as data_p FROM blog WHERE idPost = $id";

    $post = mysqli_query($conn, $sql);

}
?>