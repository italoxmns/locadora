<?php
    include_once 'layout/layout.php';
?>
<?php
    include_once 'layout/indexMenu.php';
?>  
<?php
    session_start();


    include_once 'model/conn.php';
    include_once 'model/query.php';
    
    if(isset($_POST['cadastrar'])){
        $conn = DBConnect();
        $name = mysqli_escape_string($conn,$_POST['name']);
        $login = mysqli_escape_string($conn,$_POST['email']);
        $pass = mysqli_escape_string($conn,$_POST['pass']);
        
        $teste = DBQuery('user_pwd'," where email = '$login'",'email');
        
        if($teste){
            echo "Já existe esse usuário";
        }else{
            $insert = DBInsert('user_pwd',"(name,email,pass)","('$name','$login','$pass')");
            if(!$insert){
                echo'<script type="text/javascript">document.getElementById("texto").innerHTML = "Teste";</script>';
            }
        }
    }
?>  

<div class="container py-2">
    <div class="row justify-content-center my-0  py-4">
        <div class="col-8 py-2 text-white rounded-lg" id="formulario">
        <div class="row justify-content-center py-4">
            <div class="col-6 border rounded-sm">
                <h3 class="text-center">Cadastre-se</h3>
                <form name="form" action="" method="POST">
                    <div class="form-group">
                        <label for="name">Nome Completo</label>
                        <input type="text" class="form-control" name="name" id="name" required placeholder="Fulano Beltrano Assis">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" required placeholder="email@gmail.com">
                    </div>
                    <div class="form-group ">
                        <label for="pass">Senha</label>
                        <input type="password" class="form-control" name="pass" id="pass" required placeholder="***************">
                    </div>
                    <div class="input-group justify-content-end text-white py-2">
                        <input class="btn btn-outline-light btn-md btn-block mx-1"  name="cadastrar" type="submit" value="Cadastrar"> 
                    </div>

                </form>
            </div>
        </div>

        </div>
    </div>
</div>