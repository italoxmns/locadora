<?php
    include_once 'database/conn.php';
    include_once 'model/query.php';
    if(isset($_POST['cadastrar'])){
        $conn = DBConnect();
        $name = mysqli_escape_string($conn,$_POST['name']);
        $login = mysqli_escape_string($conn,$_POST['email']);
        $pass = mysqli_escape_string($conn,$_POST['pass']);
        
        $teste = DBQuery('user_pwd'," where email = '$login'",'email');
        
        if($teste){
            echo "<script>alert('Já existe um usuário com esse e-mail')</script>";
        }else{
            $insert = DBInsert('user_pwd',"(name,email,pass)","('$name','$login','$pass')");
            if(isset($insert)){
                echo"<script>alert('Dados Inseridos com sucesso.')</script>";
                header('location: index.php');
            }
        }
    }
?>
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="formulario">
      <div class="modal-header bg-white">
        <h5 class="modal-title" id="exampleModalLabel">Cadastre-se</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" >&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
                <label for="pass1">Senha</label>
                <input type="password" class="form-control" name="pass1" id="pass1" required placeholder="***************">
            </div>
            <div class="form-group ">
                <label for="pass">Confirmar Senha</label>
                <input type="password" class="form-control" name="pass" id="pass" required placeholder="***************">
            </div>
            <div class="input-group justify-content-end text-white py-2">
                <input class="btn btn-outline-light btn-md btn-block m-0"  name="cadastrar" type="submit" value="Cadastrar"> 
            </div>
        </form>
      </div>
    </div>
  </div>
</div>