<?php
    include 'layout/layout.php';
?>
<?php
    include 'layout/menu.php';
?>

<!--        Formulario-->
<div class="container">
    <div class="row justify-content-center my-0  py-4">
         <div class="col-8 py-2 text-white rounded-lg" id="formulario">
            <h3 class="text-center">Cadastro de Cliente</h3>
            <form action="submitforms.php" method="post" >
              <div class="form-group">
                <label for="name">Nome</label>
                <input type="email" class="form-control" id="name" placeholder="Digite o nome">
              </div>

              <div class="form-group">
               <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" placeholder="email@gmail.com">
              </div>
              <div class="form-group ">
                <div class="row">
                    <div class="col-6">
                        <label for="number">Telefone</label>
                        <input type="text" class="form-control" id="telefone" >
                    </div>
                    <div class="col-6">
                        <label for="date">Data e Hora</label>
                        <input type="datetime-local" class="form-control" id="date" placeholder="DD/MM/AAAA HH:mm">
                    </div>
                </div>
              </div>
              <div class="input-group justify-content-end text-white">
                  <a class="btn btn-outline-light btn-md btn-block mx-1" href="#" onclick="mostrar()" role="button" id="button">Cadastrar</a>
              </div>
            </form>
        </div>
    </div>
</div>
