<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="editClient" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="formulario">
            <div class="modal-header bg-white">
                <h5 class="modal-title" id="exampleModalLabel">Atualizar cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>
            <div class="modal-body text-white">
                <form name="form" action="" method="POST">
                    <div class="form-group">
                        <label for="name">Nome Completo</label>
                        <input type="text" class="form-control" name="name" id="name" required placeholder="Fulano Beltrano Assis">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" required placeholder="email@gmail.com">
                    </div>
                    <div class="form-group ">
                        <label for="phone">Telefone</label>
                        <input type="tel" class="form-control" name="phone" id="phone" required >
                    </div>
                    <div class="form-group ">
                        <label for="cpf">cpf</label>
                        <input type="number" class="form-control" name="cpf" id="cpf" disabled >
                    </div>
                    <div class="input-group justify-content-end text-white py-2">
                        <input class="btn btn-outline-light btn-md btn-block m-0"  name="cadastrar" type="submit" value="Cadastrar"> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>