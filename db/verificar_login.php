<?php
require_once "conexao.php";

session_start();

if(isset($_REQUEST['logar'])){
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    
    
    //consulta ao banco de dados e validação

    $query = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'";
    $result = mysqli_query($conn, $query);

    //verificação de resultado

    if(mysqli_num_rows($result) > 0){

        $dados = mysqli_fetch_array($result);
        $_SESSION['id'] = $dados['idUsuario'];
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['email'] = $dados['email'];

        header('location:index.php');

    } else {
        
        header('location:login.php?erro=l1');
    }
}