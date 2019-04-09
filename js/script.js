// Formularios 

$(document).ready(function(){
    $('#formCliente').on('submit', function(event){
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
            var dados = $("#formCliente").serialize();
            $.post("cadastrarCliente.php", dados, function (retorna){
                if(retorna == true){
                    //Alerta de cadastro realizado com sucesso
                    $("#msg").html('<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso!</div>');
                    
                    //Limpar os campo
                    $("#formCliente")[0].reset();

                }else{
                    $("#msg").html('<div class="alert alert-danger" role="alert">Usuário já cadastrado!</div>');
                }
            });
        }
    });
});

$(document).ready(function(){
    $('#formModelo').on('submit', function(event){
        event.preventDefault();
        if($('#name').val() == ""){
            $("#msg").html('<div class="alert alert-danger" role="alert">Campo nome não foi preenchido!</div>');
        }else if($('#email').val() == ""){
            $("#msg").html('<div class="alert alert-danger" role="alert">Campo fabricante não foi preenchido!</div>');
        }else if($('#telefone').val() == ""){
            $("#msg").html('<div class="alert alert-danger" role="alert">Campo categoria não foi preenchido!</div>');
        }else{
            //Receber os dados do formulário
            var dados = $("#formModelo").serialize();
            $.post("cadastrarModelo.php", dados, function (retorna){
                if(retorna == true){
                    //Alerta de cadastro realizado com sucesso
                    $("#msg").html('<div class="alert alert-success" role="alert">Modelo cadastrado com sucesso!</div>');
                    
                    //Limpar os campo
                    $("#formModelo")[0].reset();

                }else{
                    $("#msg").html('<div class="alert alert-danger" role="alert">Modelo já cadastrado!</div>');
                }
            });
        }
    });
});
$(document).ready(function(){
    $('#modalForm').on('submit', function(event){
        event.preventDefault();
        if($('#inputNome').val() == ""){
            $("#msg").html('<div class="alert alert-danger" role="alert">Campo nome não foi preenchido!</div>');
        }else{
            //Receber os dados do formulário
            var dados = $("#modalForm").serialize();
            $.post("cadastrarCategoria.php", dados, function (retorna){
                if(retorna == true){
                    //Alerta de cadastro realizado com sucesso
                    $("#msg").html('<div class="alert alert-success" role="alert">Categoria cadastrada com sucesso!</div>');
                    
                    //Limpar os campo
                    $("#modalForm")[0].reset();

                }else{
                    $("#msg").html('<div class="alert alert-danger" role="alert">Categoria já cadastrado!</div>');
                }
            });
        }
    });
});
$(document).ready(function(){
    $('#modalForm').on('submit', function(event){
        event.preventDefault();
        if($('#inputFabricante').val() == ""){
            $("#msg").html('<div class="alert alert-danger" role="alert">Campo nome não foi preenchido!</div>');
        }else{
            //Receber os dados do formulário
            var dados = $("#modalForm").serialize();
            $.post("cadastrarFabricante.php", dados, function (retorna){
                if(retorna == true){
                    //Alerta de cadastro realizado com sucesso
                    $("#msg").html('<div class="alert alert-success" role="alert">Fabricante cadastrada com sucesso!</div>');
                    
                    //Limpar os campo
                    $("#modalForm")[0].reset();

                }else{
                    $("#msg").html('<div class="alert alert-danger" role="alert">Fabricante já cadastrado!</div>');
                }
            });
        }
    });
});
$(document).ready(function(){
    $('#formVeiculo').on('submit', function(event){
        event.preventDefault();
        var dados = $("#formVeiculo").serialize();
        $.post("cadastrarVeiculo.php", dados, function (retorna){
            if(retorna == true){
                //Alerta de cadastro realizado com sucesso
                $("#msg").html('<div class="alert alert-success" role="alert">Veículo cadastrado com sucesso!</div>');
                
                //Limpar os campo
                // $("#formVeiculo")[0].reset();
                $('#formVeiculo').each (function(){
                      this.reset();
                    });
            }else{
                $("#msg").html('<div class="alert alert-danger" role="alert">Veículo já cadastrado!</div>');
            }
        });
        
    });
});
