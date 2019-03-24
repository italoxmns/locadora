<?php
    include_once 'layout/layout.php';
?>
<?php
    include_once 'layout/menu.php';
?>
<!--        conteudo-->
<?php
   session_start();
   if(!isset($_SESSION['usuarioLog'])){
      header("location: login.php");
      session_destroy();
   }
   if(isset($_GET['sair'])){
    session_destroy();
    header("location: index.php");
   }
?>
<div class="container py-2">
    <div class="row justify-content-center" > 
        <div class="col-sm-8 ">
            <div class="row py-2">
                <div class="col-12 text-center py-2">
                    <h3> Lista de Clientes</h3>
                </div>
                <div class="col-12">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First</th>
                          <th scope="col">Last</th>
                          <th scope="col">Handle</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                        </tr>
                      </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>

