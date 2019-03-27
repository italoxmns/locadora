<?php
      include_once 'database/conn.php';
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
              echo "<script>alert('Error');</script>";
          }
      }
?>
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="formulario">
      <div class="modal-header bg-white">
        <h5 class="modal-title" id="exampleModalLabel">Acesso ao sistema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" >&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
                <input class="btn btn-outline-light btn-md btn-block m-0" name="entrar" type="submit" value="Entrar"> 
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