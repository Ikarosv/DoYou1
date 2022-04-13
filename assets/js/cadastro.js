function validaSenha(){
    $senha = document.getElementById("senha").value;
    $senha2 = document.getElementById("senha2").value;
    if($senha != $senha2){
        document.getElementById("pw2").style.border = "red 2px solid";
    }else{
        document.getElementById("pw2").style.border = "green 2px solid";
    }
}

