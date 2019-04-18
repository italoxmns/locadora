<?php 
include_once 'database/conn.php';

function DBQuery($table, $params = null, $columns = "*"){
    $params = ($params) ? "{$params}" : null;
    $columns = ($columns) ? "{$columns}" : "*";

    $sql = "SELECT {$columns} FROM {$table}{$params}";
    $result = DBExecute($sql);

    return $result;

}

function DBInsert ($table, $params = null, $columns = "*"){
    $params = ($params) ? "{$params}" : null;
    $columns = ($columns) ? "{$columns}" : "*";

    $insert = "INSERT INTO {$table}{$params} VALUES {$columns}";
    if(!DBExecute($insert)){
        return false;
    }else{
        return true;
    }
}


function DBExecute($sql){
    $con = DBConnect();
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    DBClose($con);
    return $result;
}
?>