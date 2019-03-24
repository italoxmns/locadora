<?php
    include_once 'layout/layout.php';
?>
<?php
    session_start();

    if(isset($_SESSION['usuarioLog'])){
        header("location:admin.php");
        die();
     }

    include_once 'model/conn.php';
    include_once 'model/query.php';
    
    if(isset($_POST['entrar'])){
        $conn = DBConnect();
        $login = mysqli_escape_string($conn,$_POST['email']);
        $pass = mysqli_escape_string($conn,$_POST['pass']);
        
        
        $teste = DBQuery('user_pwd'," where email = '$login' AND pass = '$pass'",'email');
        
        if($teste){
            $_SESSION['usuarioLog'] = true;
            header("location: admin.php");
        }else{
            echo '<script> Alert("Não encontrado");</script>';
        }
    }
    

?>  
<?php
    include_once 'layout/indexMenu.php';
?>  
<div class="container py-2">
    <div class="row justify-content-center my-0  py-4">
        <div class="col-8 py-2 text-white rounded-lg" id="formulario">
        <div class="row justify-content-center py-4">
            <div class="col-6 border rounded-sm">
                <h3 class="text-center">Acesso ao sistema</h3>
                <form name="form" action="" method="POST">
                    <div class="form-group">
                        <label for="email">Login</label>
                        <input type="email" class="form-control" name="email" id="email" required placeholder="email@gmail.com">
                    </div>
                    <div class="form-group ">
                        <label for="pass">Senha</label>
                        <input type="password" class="form-control" name="pass" id="pass" required placeholder="***************">
                    </div>
                    <div class="input-group justify-content-end text-white py-2">
                        <input class="btn btn-outline-light btn-md btn-block mx-1"  name="entrar" type="submit" value="Entrar"> 
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 text-center text-white" >
                            <a class="link" href="#">Esqueceu sua senha?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        </div>
    </div>
</div>