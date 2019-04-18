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
include_once 'modal/fabricante.php';
include_once 'modal/categoria.php';
include_once 'database/query.php';

?>

<!--        Formulario-->
<div class="container">
    <div class="row justify-content-center pt-3 mt-3">
        <h3 class="display-4 text-center">Cadastro de Modelo</h3>
        <div class="col-10 py-1 p-0 m-0 text-center">
            <span id="msg"></span>
        </div>
        <div class="col-10 py-2  text-white rounded-lg" id="formulario">
            <div class="row justify-content-center py-3">
                <div class="col-8  border rounded py-3">
                    <form action="" method="POST" name="formModelo" id="formModelo">
                        <div class="form-group ">
                            <div class="row">
                                <div class="col">
                                    <label for="modelo">Nome do Modelo</label>
                                    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Corsa/Celta/Civic..." required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="portas">Fabricante</label>
                                    <div class="row m-0">
                                        <div class="input-group">
                                            <select class="custom-select" id="fabricante" name="fabricante" required>
                                                <option value="" selected> </option>
                                                <?php

                                    $select = DBQuery('fabricante');

                                    $linha = mysqli_fetch_assoc($select);

                                    $total = mysqli_num_rows($select);

                                    if($total > 0) {
                                        do {
                                    ?>
                                                    <option value="<?=$linha['idfabricante']?>">
                                                        <?=$linha['fabricante']?>
                                                    </option>
                                                    <?php
                                        }while($linha = mysqli_fetch_assoc($select));

                                    }
                                    ?>
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn text-white border" type="button" id="plus" data-toggle="modal" data-target="#manufacture">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="portas">Categoria</label>
                                    <div class="row m-0">
                                        <div class="input-group">
                                            <select class="custom-select" id="categoria" name="categoria" required>
                                                <option value="" selected> </option>
                                                <?php

                                        $select = DBQuery('categoria');

                                        $linha = mysqli_fetch_assoc($select);

                                        $total = mysqli_num_rows($select);

                                        if($total > 0) {
                                            do {
                                        ?>
                                                    <option value="<?=$linha['idcategoria']?>">
                                                        <?=$linha['categoria']?>
                                                    </option>
                                                    <?php
                                            }while($linha = mysqli_fetch_assoc($select));

                                        }
                                        ?>
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn text-white border" type="button" id="plus" data-toggle="modal" data-target="#category"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group justify-content-end">
                                <input class="btn btn-outline-light btn-md btn-block m-0" name="cadastrar" type="submit" value="Cadastrar">
                                <!-- <a class="btn btn-outline-light btn-md btn-block mx-1" href="#" role="button" id="button">Cadastrar</a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>