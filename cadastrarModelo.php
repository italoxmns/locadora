<?php
    include_once 'model/query.php';

    $nome = filter_input(INPUT_POST, 'inputModelo', FILTER_SANITIZE_STRING);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
    $fabricante = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_STRING);
    // echo "Nome: ".$nome."\nCategoria: ".$categoria."\nFabricante: ".$fabricante;

    $select = DBQuery('modelo'," where name like '$nome'");
    $linha = mysqli_num_rows($select);

    if($linha =! 0){
        echo DBInsert('modelo',"(name,categoria_idcategoria,fabricante_idfabricante)","('$nome',$categoria,$fabricante)");
    }else{     
        echo false;
    }
    
?>