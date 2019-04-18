<?php
include_once 'database/query.php';

$modelo = filter_input(INPUT_POST, 'inputModelo', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
$fabricante = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_STRING);
// echo "Nome: ".$nome."\nCategoria: ".$categoria."\nFabricante: ".$fabricante;

$select = DBQuery('modelo'," where modelo like '$modelo'");
$linha = mysqli_num_rows($select);

if($linha =! 0){
    echo DBInsert('modelo',"(modelo,categoria_idcategoria,fabricante_idfabricante)","('$modelo',$categoria,$fabricante)");
}else{     
    echo false;
}

?>