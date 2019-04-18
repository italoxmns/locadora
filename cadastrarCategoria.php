<?php
include_once 'database/query.php';

$categoria = filter_input(INPUT_POST, 'inputCategoria', FILTER_SANITIZE_STRING);

$select = DBQuery('categoria'," where categoria like '$categoria'");
$linha = mysqli_num_rows($select);

if($linha =! 0){
    echo DBInsert('categoria',"(categoria)","('$categoria')");
}else{     
    echo false;
}

?>