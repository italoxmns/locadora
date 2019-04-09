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
  include_once 'model/query.php';
    // realiza a conexao com o banco de dados
    $con = DBConnect();

    // seleciona a base de dados em que vamos trabalhar
    $select = DBQuery('modelo');
    
    $linha = mysqli_fetch_assoc($select);
    // calcula quantos dados retornaram
    $total = mysqli_num_rows($select);
?>

<!--        Formulario-->
<div class="container">
    <div class="row justify-content-center pt-3 mt-3" >
        <div class="col-8 py-2  text-white rounded-lg" id="formulario">
            <h3 class="text-center">Cadastro de Veículo</h3>
            <form action="" method="post">
                <div class="form-group ">
                    <div class="row">
                        <div class="col-4">
                            <label for="placa">Placa</label>
                            <input type="text" class="form-control" id="placa" required placeholder="XXX-0000">
                        </div>
                        <div class="col-4">
                            <label for="ano">Ano</label>
                            <input type="number" class="form-control" id="ano" required placeholder="AAAA" min="1990" max="2019">
                        </div>
                        <div class="col-4">
                            <label for="lugares">Lugares</label>
                            <select class="custom-select" id="lugares">
                                <option value="" selected> </option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <label for="portas">Nº de Portas</label>
                            <select class="custom-select" id="portas">
                                <option value="" selected> </option>
                                <option value="1">2</option>
                                <option value="2">4</option>
                                <option value="3">4+</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="cor">Cor</label>
                            <input type="text" class="form-control" required id="cor" placeholder="Cor do Veículo">
                        </div>
                        <div class="col-4">
                            <label for="portas">Modelo</label>
                            <div class="row m-0">
                                <div class="col-9 m-0 p-0">
                                    <select class="custom-select" id="modelo">
                                        <option value="" selected> </option>
                                        <?php    
                                            if($total > 0) {
                                                do {
                                        ?>
                                            <option value="{<?=$linha['idmodelo']?>}"><?=$linha['name']?></option>
                                        <?php
                                            }while($linha = mysqli_fetch_assoc($select));
                                                // fim do if 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-3 m-0 pr-0">
                                    <a class="btn m-0 p-1" href="frontmodel.php" id="plus">
                                        <i class="fas fa-plus-circle p-0" style="font-size:1.7em;"></i>
                                    </a>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="portas">Potência</label>
                            <select class="custom-select" id="potencia">
                                <option value="" selected> </option>
                                <option value="1.0">1.0</option>
                                <option value="1.5">1.4</option>
                                <option value="1.6">1.6</option>
                                <option value="2.0">2.0</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="portas">Status</label>
                            <select class="custom-select" id="status">
                                <option value="" selected> </option>
                                <option value="true">Disponível</option>
                                <option value="false">Alocado</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="input-group justify-content-end text-white">
                    <input class="btn btn-outline-light btn-md btn-block m-0"  name="cadastrar" type="submit" value="Cadastrar"> 
                    <!-- <a class="btn btn-outline-light btn-md btn-block mx-1" href="#" role="button" id="button">Cadastrar</a> -->
                </div>
            </form>
        </div>
    </div>     
</div>
