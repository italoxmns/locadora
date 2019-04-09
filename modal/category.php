
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="formulario">
      <div class="modal-header bg-white">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" >&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="modalForm" action="" method="POST" id="modalForm">
            <div class="form-group text-white">
                <label for="nome">Categoria</label>
                <input type="text" class="form-control" name="inputNome" id="inputNome" required placeholder="Hatch/SUV/Sedan...">
            </div>
            <div class="input-group justify-content-end text-white py-2">
                <input class="btn btn-outline-light btn-md btn-block m-0" name="cadastrar" type="submit" value="Cadastrar"> 
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
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
</script>