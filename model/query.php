<?php 
    include_once 'database/config.php';
    include_once 'database/conn.php';

    function DBQuery($table, $params = null, $columns = "*"){
        $params = ($params) ? "{$params}" : null;
        $columns = ($columns) ? "{$columns}" : "*";
        
        $sql = "SELECT {$columns} FROM {$table}{$params}";
        $result = DBExecute($sql);
        
        if(!mysqli_num_rows($result)){
            return false;
        }else{
            while($res = mysqli_fetch_assoc($result)){
                $dados[] = $res;
            }
            return $dados;
        }
            
    }
    function DBInsert ($table, $params = null, $columns = "*"){
        $con = DBConnect();
        $params = ($params) ? "{$params}" : null;
        $columns = ($columns) ? "{$columns}" : "*";
        
        $insert = "INSERT INTO {$table}{$params} VALUES {$columns};";
        
//      return var_dump($insert); retorna a string do sql
             
        $insert = "INSERT INTO {$table}{$params} VALUES {$columns}";
        if(!DBExecute($insert)){
            // return mysqli_error($con);
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