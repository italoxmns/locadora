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
    function DBInsert ($table, $params = "*", $columns = null){
        $con = DBConnect();
        $params = ($params) ? "{$params}" : "*";
        $columns = ($columns) ? "{$columns}" : null;
        
        if (strpos($columns,"''") !== false) {
            echo'<script type="text/javascript">document.getElementById("texto").innerHTML = "Teste"</script>';
        }else{
            $insert = "INSERT INTO {$table}{$params} VALUES {$columns}";
            if(!DBExecute($insert)){
                return mysqli_error($con);
            }else{
                return true;
            }
        }
        
        
        
    }
    function DBExecute($sql){
        $con = DBConnect();
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        DBClose($con);
        
        return $result;
    }
?>