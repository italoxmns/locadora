
<?php
    include_once 'query.php';
    $conn = DBConnect();
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);

    $select = DBQuery('cliente'," where email = '$email' or cpf = '$cpf'",'email');
    if($select){
        return false;
    }else{
        return DBInsert('cliente',"(name,telefone,cpf,email)","('$name','$telefone','$cpf','$email')");;
    }
    
?>