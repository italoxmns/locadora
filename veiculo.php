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
include_once 'public/layout/layout.php';
include_once 'public/layout/menu.php';
include_once 'database/query.php';
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
        <div class="col-8 py-1 p-0 m-0 text-center">
            <span id="msg"></span>
        </div>
        <div class="col-10 py-2  text-white rounded-lg" id="formulario">
            <h3 class="text-center">Cadastro de Veículo</h3>
            <form action="" method="POST" id="formVeiculo" name="formVeiculo">
                <div class="form-group ">
                    <div class="row">
                        <div class="col-6">
                            <label for="inputPlaca">Placa</label>
                            <input type="text" class="form-control" id="inputPlaca" name="inputPlaca" required placeholder="XXX-0000">
                        </div>
                        <div class="col-6">
                            <label for="inputAno">Ano</label>
                            <input type="number" class="form-control" id="inputAno" name="inputAno" required placeholder="AAAA" min="1990" max="2019">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="inputLugares">Lugares</label>
                            <select class="custom-select" id="inputLugares" name="inputLugares" required>
                                <option value="" selected> </option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="inputModelo">Modelo</label>
                            <div class="row m-0">
                            <div class="input-group">
                                <select class="custom-select" id="inputModelo" name="inputModelo">
                                    <option value="" selected> </option>
                                    <?php    
                                    if($total > 0) {
                                        do {
                                    ?>
                                    <option value="<?=$linha['idmodelo']?>"><?=$linha['modelo']?></option>
                                    <?php
                                        }while($linha = mysqli_fetch_assoc($select));
                                        // fim do if 
                                    }
                                    ?>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn border" type="button">
                                        <a class="text-white" href="modelo.php" id="plus" >
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="inputPotencia">Potência</label>
                            <select class="custom-select" id="inputPotencia" name="inputPotencia" required>
                                <option value="" selected> </option>
                                <option value="1.0">1.0</option>
                                <option value="1.5">1.4</option>
                                <option value="1.6">1.6</option>
                                <option value="2.0">2.0</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="inputStatus">Status</label>
                            <select class="custom-select" id="inputStatus" name="inputStatus">
                                <option value="" selected> </option>
                                <option value="1">Disponível</option>
                                <option value="0">Alocado</option>

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
