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
    include_once 'database/conn.php';
    include_once 'model/query.php';

    
?>

<!--        Formulario-->
<div class="container">
    <div class="row justify-content-center pt-3 mt-3" >
        <div class="col-8 py-1 p-0 m-0 text-center">
            <span id="msg"></span>
        </div>  
        <div class="col-8 py-2  text-white rounded-lg" id="formulario">
            <h3 class="text-center">Cadastro de Modelo</h3>
            <form action="" method="POST" name="form" id="form">
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label for="inputModelo">Nome do Modelo</label>
                            <input type="text" class="form-control" id="inputModelo" name="inputModelo" placeholder="Corsa/Celta/Civic..." required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="portas">Fabricante</label>
                            <div class="row m-0">
                                <div class="col-9 m-0 p-0">
                                    <select class="custom-select" id="fabricante" name="fabricante" required>
                                            <option value="" selected> </option>
                                            <?php
                                                // seleciona a base de dados em que vamos trabalhar
                                                $select = DBQuery('fabricante');
                                                
                                                $linha = mysqli_fetch_assoc($select);
                                                // calcula quantos dados retornaram
                                                $total = mysqli_num_rows($select);
    
                                                if($total > 0) {
                                                    do {
                                            ?>
                                                <option value="<?=$linha['idfabricante']?>"><?=$linha['name']?></option>
                                            <?php
                                                }while($linha = mysqli_fetch_assoc($select));
                                                    // fim do if 
                                                }
                                            ?>
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
                                <select class="custom-select" id="categoria" name="categoria" required>
                                            <option value="" selected> </option>
                                            <?php
                                                // seleciona a base de dados em que vamos trabalhar
                                                $select = DBQuery('categoria');
                                                
                                                $linha = mysqli_fetch_assoc($select);
                                                // calcula quantos dados retornaram
                                                $total = mysqli_num_rows($select);
    
                                                if($total > 0) {
                                                    do {
                                            ?>
                                                <option value="<?=$linha['idcategoria']?>"><?=$linha['nome']?></option>
                                            <?php
                                                }while($linha = mysqli_fetch_assoc($select));
                                                    // fim do if 
                                                }
                                            ?>
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

<script>
    $(document).ready(function(){
        $('#form').on('submit', function(event){
            event.preventDefault();
            if($('#name').val() == ""){
                $("#msg").html('<div class="alert alert-danger" role="alert">Campo nome não foi preenchido!</div>');
            }else if($('#email').val() == ""){
                $("#msg").html('<div class="alert alert-danger" role="alert">Campo fabricante não foi preenchido!</div>');
            }else if($('#telefone').val() == ""){
                $("#msg").html('<div class="alert alert-danger" role="alert">Campo categoria não foi preenchido!</div>');
            }else{
                //Receber os dados do formulário
                var dados = $("#form").serialize();
                $.post("cadastrarModelo.php", dados, function (retorna){
                    alert(retorna)
                    if(retorna == true){
                        //Alerta de cadastro realizado com sucesso
                        $("#msg").html('<div class="alert alert-success" role="alert">Modelo cadastrado com sucesso!</div>');
                        
                        //Limpar os campo
                        $("#form")[0].reset();

                    }else{
                        $("#msg").html('<div class="alert alert-danger" role="alert">Modelo já cadastrado!</div>');
                    }
                });
            }
        });
    });
</script>