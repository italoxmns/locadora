<?php
    include_once 'model/query.php';

    $nome = filter_input(INPUT_POST, 'inputFabricante', FILTER_SANITIZE_STRING);

    $select = DBQuery('fabricante'," where name like '$nome'");
    $linha = mysqli_num_rows($select);

    if($linha =! 0){
        echo DBInsert('fabricante',"(name)","('$nome')");
    }else{     
        echo false;
    }
    
?>