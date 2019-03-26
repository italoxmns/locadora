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
    <div class="row justify-content-center my-0 py-2" >
        <div class="col-8 py-2  text-white rounded-lg" id="formulario">
            <h3 class="text-center">Cadastro de Veículo</h3>
            <form action="submitforms.php" method="post">
                <div class="form-group ">
                    <div class="row">
                        <div class="col-4">
                            <label for="placa">Placa</label>
                            <input type="text" class="form-control" id="placa" placeholder="XXX-0000">
                        </div>
                        <div class="col-4">
                            <label for="ano">Ano</label>
                            <input type="number" class="form-control" id="ano" placeholder="AAAA" min="1990" max="2019">
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
                        <div class="col-6">
                            <label for="fabricante">Fabricante</label>
                            <select class="custom-select" id="fabricante">
                                <option value="" selected> </option>
                                <option value="1">Fiat</option>
                                <option value="2">Hiunday</option>
                                <option value="3">Chevrolet</option>
                                <option value="4">Toyota</option>
                                <option value="5">Wolksvagem</option>
                                <option value="6">Honda</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="model">Modelo</label>
                            <input type="text" class="form-control" id="model" placeholder="Modelo do Veículo">
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
                            <input type="text" class="form-control" id="cor" placeholder="Cor do Veículo">
                        </div>
                        <div class="col-4">
                            <label for="cat">Categoria</label>
                            <select class="custom-select" id="portas">
                                <option value="" selected> </option>
                                <option value="EN">ENTRADA</option>
                                <option value="HP">HATCH PEQUENO</option>
                                <option value="HM">HATCH MÉDIO</option>
                                <option value="SP">SEDANS PEQUENOS</option>
                                <option value="SC">SEDANS COMPACTOS</option>
                                <option value="SM">SEDANS MÉDIOS</option>
                                <option value="SG">SEDANS GRANDES</option>
                                <option value="SV">SUV</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="portas">Potência</label>
                            <select class="custom-select" id="portas">
                                <option value="" selected> </option>
                                <option value="1.0">1.0</option>
                                <option value="1.5">1.4</option>
                                <option value="1.6">1.6</option>
                                <option value="2.0">2.0</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="valor">Valor do Aluguel</label>
                            <input type="text" class="form-control" id="valor" placeholder="R$ 0.00,00">
                        </div>
                    </div>
                </div>
                <div class="input-group justify-content-end text-white">
                    <input class="btn btn-outline-light btn-md btn-block mx-1"  name="cadastrar" type="submit" value="Cadastrar"> 
                    <!-- <a class="btn btn-outline-light btn-md btn-block mx-1" href="#" role="button" id="button">Cadastrar</a> -->
                </div>
            </form>
        </div>
    </div>     
</div>
