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
        <div class="col-8 py-1 p-0 m-0 text-center">
            <span id="msg"></span>
        </div>
         <div class="col-8 py-2 text-white rounded-lg" id="formulario">
            <h3 class="text-center">Cadastro de Cliente</h3>
            
            <form name="form" action="" method="POST" id="form" >
              <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control"  id="name" name="name" placeholder="Digite o nome">
              </div>

              <div class="form-group">
               <label for="email">E-mail</label>
                <input type="email" class="form-control"  id="email" name="email" placeholder="email@gmail.com">
              </div>
              <div class="form-group ">
                <div class="row">
                    <div class="col-6">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control"  id="telefone" name="telefone" placeholder="">
                    </div>
                    <div class="col-6">
                        <label for="cpf">CPF</label>
                        <input type="number" class="form-control"  id="cpf" name="cpf" placeholder="000.000.000-00">
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

<script>
    $(document).ready(function(){
        $('#form').on('submit', function(event){
            event.preventDefault();
            if($('#name').val() == ""){
                $("#msg").html('<div class="alert alert-danger" role="alert">Campo nome não foi preenchido!</div>');
            }else if($('#email').val() == ""){
                $("#msg").html('<div class="alert alert-danger" role="alert">Campo e-mail não foi preenchido!</div>');
            }else if($('#telefone').val() == ""){
                $("#msg").html('<div class="alert alert-danger" role="alert">Campo telefone não foi preenchido!</div>');
            }else if($('#cpf').val() == ""){
                $("#msg").html('<div class="alert alert-danger" role="alert">Campo cpf não foi preenchido!</div>');
            }else{
                //Receber os dados do formulário
                var dados = $("#form").serialize();
                $.post("model/cadastrarCliente.php", dados, function (retorna=false){
                    if(retorna == true){
                        //Alerta de cadastro realizado com sucesso
                        $("#msg").html('<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso!</div>');
                        
                        //Limpar os campo
                        $("#form")[0].reset();

                    }else{
                        $("#msg").html('<div class="alert alert-danger" role="alert">Usuário já cadastrado!</div>');
                    }
                });
            }
        });
    });
</script>

