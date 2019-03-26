<?php
  session_start();
  if(!isset($_SESSION['usuarioLog'])){
    header('location: index.php');
    session_destroy();
  }
  if(isset($_GET['sair'])){
    session_destroy();
    header('location:index.php');
  }
  include_once 'layout/layout.php';
  include_once 'layout/menu.php';
?>

<!--        Formulario-->
<div class="container">
    <div class="row justify-content-center my-0  py-4">
         <div class="col-8 py-2 text-white rounded-lg" id="formulario">
            <h3 class="text-center">Cadastro de Cliente</h3>
            <form action="submitforms.php" method="post" >
              <div class="form-group">
                <label for="name">Nome</label>
                <input type="email" class="form-control" required id="name" placeholder="Digite o nome">
              </div>

              <div class="form-group">
               <label for="email">E-mail</label>
                <input type="email" class="form-control" required id="email" placeholder="email@gmail.com">
              </div>
              <div class="form-group ">
                <div class="row">
                    <div class="col-4">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" required id="telefone" placeholder="(00)">
                    </div>
                    <div class="col-4">
                        <label for="cpf">CPF</label>
                        <input type="number" class="form-control" required id="cpf" placeholder="000.000.000-00">
                    </div>
                    <div class="col-4">
                        <label for="date">Data e Hora</label>
                        <input type="datetime-local" class="form-control" required id="date" placeholder="DD/MM/AAAA HH:mm">
                    </div>
                </div>
              </div>
              <div class="input-group justify-content-end text-white">
                <input class="btn btn-outline-light btn-md btn-block mx-1"  name="cadastrar" type="submit" value="Cadastrar"> 
              </div>
            </form>
        </div>
    </div>
</div>
