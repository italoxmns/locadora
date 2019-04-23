
// $(document).ready(function(){
//     $('.custom-control-input').on('change',function(event){
//         event.preventDefault();
//         alert($('.custom-control-input').prop('id'));
//     });
// });
$(document).ready(function(){
    $('#alugar').hide();
    $("input[type='radio']").on('change',function(){
        var radioValue = $("input[name='groupOfDefaultRadios']:checked").val();
        if(radioValue){
            $('#alugar').show();
        }
    });
    
});
// Formularios 
$(document).ready(function(){
    $('#formCliente').on('submit', function(event){
        event.preventDefault();
        if($('#nome').val() == ""){
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
        if($('#modelo').val() == ""){
            $("#msg").html('<div class="alert alert-danger" role="alert">Campo nome não foi preenchido!</div>');
        }else if($('#fabricante').val() == ""){
            $("#msg").html('<div class="alert alert-danger" role="alert">Campo fabricante não foi preenchido!</div>');
        }else if($('#categoria').val() == ""){
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
    $('#formCategoria').on('submit', function(event){
        event.preventDefault();
        if($('#inputCategoria').val() == ""){
            $("#msg").html('<div class="alert alert-danger" role="alert">Campo nome da categoria não foi preenchido!</div>');
        }else{
            //Receber os dados do formulário
            var dados = $("#formCategoria").serialize();
            $.post("cadastrarCategoria.php", dados, function (retorna){
                if(retorna == true){
                    // window.location.href('modelo.php');
                    //Alerta de cadastro realizado com sucesso
                    $("#msg").html('<div class="alert alert-success" role="alert">Categoria cadastrada com sucesso!</div>');
                    
                    //Limpar os campo
                    $("#formCategoria")[0].reset();
                   
                }else{
                    $("#msg").html('<div class="alert alert-danger" role="alert">Categoria já cadastrado!</div>');
                }
            });
        }
    });
});
$(document).ready(function(){
    $('#formFabricante').on('submit', function(event){
        event.preventDefault();
        if($('#inputFabricante').val() == ""){
            $("#msg").html('<div class="alert alert-danger" role="alert">Campo nome não foi preenchido!</div>');
        }else{
            //Receber os dados do formulário
            var dados = $("#formFabricante").serialize();
            $.post("cadastrarFabricante.php", dados, function (retorna){
                if(retorna == true){
                    //Alerta de cadastro realizado com sucesso
                    $("#msg").html('<div class="alert alert-success" role="alert">Fabricante cadastrada com sucesso!</div>');

                    //Limpar os campo
                    $('#formFabricante').each (function(){
                        this.reset();
                    });

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
