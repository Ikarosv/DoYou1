<?php
require_once "conexao.php";
//Retornar post para index

$sql = "SELECT * , date_format(data_post, '%d/%m/%Y') as data_p FROM blog";
$post = mysqli_query($conn, $sql);

?>