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
<!--        conteudo-->
<div class="container py-2">
    <div class="row justify-content-center" > 
        <div class="col-sm-8 ">
            <div class="row py-2">
                <div class="col-12 text-center py-2">
                    <h3 class="Display-5">Demanda de Clientes </h3>
                </div>
                <div class="col-12 p-1 m-0">
                    <table class="table">
                      <thead>
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
                          <td colspan="2">Larry the Bird</td>
                          <td>@twitter</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

