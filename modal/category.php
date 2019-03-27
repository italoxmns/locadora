<?php
    include_once 'database/conn.php';
    include_once 'model/query.php';

    if(isset($_POST['cadastrar'])){
        $conn = DBConnect();
        $category = mysqli_escape_string($conn,$_POST['categoria']);
        
        $teste = DBQuery('categoria'," where nome = '$category'",'nome');
        
        if($teste){
            echo "<script>alert('Já existe uma com esse nome')</script>";
        }else{
            $insert = DBInsert('categoria',"(nome)","('$category')");
            if(isset($insert)){
                echo"<script>alert('Dados Inseridos com sucesso.')</script>";
                header('location: frontmodel.php');
            }else{
              echo"<script>alert('Dados Não inseridos.')</script>";
              // header('location: frontmodel.php');
            }
        }
    }
?>
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="formulario">
      <div class="modal-header bg-white">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" >&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form" action="" method="POST">
            <div class="form-group text-white">
                <label for="categoria">Categoria</label>
                <input type="text" class="form-control" name="categoria" id="categoria" required placeholder="Hatch/SUV/Sedan...">
            </div>
            <div class="input-group justify-content-end text-white py-2">
                <input class="btn btn-outline-light btn-md btn-block m-0" name="cadastrar" type="submit" value="Cadastrar"> 
            </div>
        </form>
      </div>
    </div>
  </div>
</div>