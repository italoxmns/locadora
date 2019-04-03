
<?php

    include_once 'database/conn.php';
    include_once 'model/query.php';
    $conn = DBConnect();
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);

    $teste = DBQuery('cliente'," where email = '$email' OR cpf = '$cpf'",'email');
          
    if($teste){
        $return = false;
    }else{
        $query_usuario = DBInsert('cliente',"(name,telefone,cpf,email)","('$name','$telefone','$cpf','$email')");
        $return = true;
    }
    echo $return;
?>