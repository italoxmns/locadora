<?php
    include_once 'model/query.php';

    $nome = filter_input(INPUT_POST, 'inputNome', FILTER_SANITIZE_STRING);

    $select = DBQuery('categoria'," where nome like '$nome'");
    $linha = mysqli_num_rows($select);

    if($linha =! 0){
        echo DBInsert('categoria',"(nome)","('$nome')");
    }else{     
        echo false;
    }
    
?>