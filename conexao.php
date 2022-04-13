<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "db_financas";
    $porta = "3304";

    $conn = mysqli_connect($servidor, $usuario, $senha, $banco, $porta);

    mysqli_set_charset($conn, "utf8");

    if(mysqli_connect_errno()){

        echo "Erro na conexão:" . mysqli_connect_error();

    }


