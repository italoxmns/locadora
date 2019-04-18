<?php
include_once 'database/query.php';

$fabricante = filter_input(INPUT_POST, 'inputFabricante', FILTER_SANITIZE_STRING);

$select = DBQuery('fabricante'," where fabricante like '$fabricante'");
$linha = mysqli_num_rows($select);

if($linha =! 0){
    echo DBInsert('fabricante',"(fabricante)","('$fabricante')");
}else{     
    echo false;
}

?>