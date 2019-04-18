<?php
include_once 'database/query.php';

$modelo = filter_input(INPUT_POST, 'inputModelo', FILTER_SANITIZE_STRING);
$placa = filter_input(INPUT_POST, 'inputPlaca', FILTER_SANITIZE_STRING);
$ano = filter_input(INPUT_POST, 'inputAno', FILTER_SANITIZE_STRING);
$lugares = filter_input(INPUT_POST, 'inputLugares', FILTER_SANITIZE_STRING);
$potencia = filter_input(INPUT_POST, 'inputPotencia', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'inputStatus', FILTER_SANITIZE_STRING);


$select = DBQuery('veiculo'," where placa like '$placa'");
$linha = mysqli_num_rows($select);

if($linha =! 0){
    echo DBInsert('veiculo',"(modelo_idmodelo,placa,ano,lugares,potencia,status)","($modelo,'$placa',$ano,'$lugares','$potencia',$status)");
}else{     
    echo false;
}

?>