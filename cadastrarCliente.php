<?php
    include_once 'model/query.php';

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);

    // echo "Nome: ".$nome."\nE-mail:".$email."\nTelefone: ".$telefone;
    $select = DBQuery('cliente'," where email = '$email' or cpf = '$cpf'");
    $linha = mysqli_num_rows($select);

    if($linha =! 0){
        echo DBInsert('cliente',"(name,telefone,cpf,email)","('$nome','$telefone','$cpf','$email')");
    }else{     
        echo false;
    }
    
?>