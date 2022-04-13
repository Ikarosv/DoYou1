<?php
require_once "conexao.php";

$cmdcarrossel = "SELECT * FROM blog ORDER BY data_post desc LIMIT 5";
$carquery = mysqli_query($conn, $cmdcarrossel);