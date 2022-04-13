<?php

    require_once "conexao.php";
    session_start();

    // cria um array de emails cadastrados
    $sql = "SELECT email FROM usuario";
    $result = mysqli_query($conn, $sql);
    $emails=[];
    while ($email = mysqli_fetch_assoc($result)){
        $emails[] = $email['email'];
    }
 
    if(isset($_POST['novo_usuario'])){
        if($_POST['senha']!=$_POST['senha2']){
            header("Location: cadastro.php?erro=1");    
        }else if (in_array($_POST['email'], $emails)){
            header("Location: cadastro.php?erro=2");
        } else {
        $nome = $_POST['nome'];
        $email= $_POST['email'];
        $senha= md5($_POST['senha']);

        $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?,?)";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, 'sss', $nome, $email, $senha);

        //executa statement preparado
        mysqli_stmt_execute($stmt);

        //fecha statement e conexão
        mysqli_stmt_close($stmt);

        $query = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'";
         $result = mysqli_query($conn, $query);

    //verificação de resultado

       if(mysqli_num_rows($result) > 0){

        $dados = mysqli_fetch_array($result);
        $_SESSION['id'] = $dados['idUsuario'];
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['email'] = $dados['email'];
        
        header("Location: inicio.php?msg=1");

        exit();
        }
    }}