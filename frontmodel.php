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
    include_once 'modal/manufacture.php';
    include_once 'modal/category.php';
      // realiza a conexao com o banco de dados
    $con = DBConnect();

    // seleciona a base de dados em que vamos trabalhar
    $select = DBQuery('cliente');
    
    $linha = mysqli_fetch_assoc($select);
    // calcula quantos dados retornaram
    $total = mysqli_num_rows($select);

?>

<!--        Formulario-->
<div class="container">
    <div class="row justify-content-center pt-3 mt-3" >
        <div class="col-8 py-2  text-white rounded-lg" id="formulario">
            <h3 class="text-center">Cadastro de Modelo</h3>
            <form action="submitforms.php" method="post">
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label for="inputModelo">Nome do Modelo</label>
                            <input type="text" class="form-control" id="inputModelo" placeholder="Corsa/Celta/Civic...">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="portas">Fabricante</label>
                            <div class="row m-0">
                                <div class="col-9 m-0 p-0">
                                    <select class="custom-select" id="fabricante">
                                        <option value="" selected> </option>
                                        <option value="1">Fiat</option>
                                        <option value="2">Chevrole</option>
                                        <option value="3">JEEP</option>
                                    </select>
                                </div>
                                <div class="col-3 m-0 pr-0">
                                    <a class="btn m-0 p-1" href="" id="plus" data-toggle="modal" data-target="#manufacture">
                                        <i class="fas fa-plus-circle p-0" style="font-size:1.7em;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="portas">Categoria</label>
                            <div class="row m-0">
                                <div class="col-9 m-0 p-0">
                                    <select class="custom-select" id="">
                                        <option value="" selected> </option>
                                        <option value="1">Hatch</option>
                                        <option value="2">Sedan</option>
                                        <option value="3">SUV</option>
                                    </select>
                                </div>
                                <div class="col-3 m-0 pr-0">
                                    <a class="btn m-0 p-1" href="" id="plus" data-toggle="modal" data-target="#category">
                                        <i class="fas fa-plus-circle p-0" style="font-size:1.7em;"></i>
                                    </a>
                                </div>
                            </div>
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
