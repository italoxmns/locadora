
<div class="modal fade" id="aluguel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="formulario">
            <div class="modal-header bg-white">
                <h5 class="modal-title" id="exampleModalLabel">Alugar veículo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>
            <div class="modal-body text-white">
                <form name="form" action="" method="POST">
                    <?php
                    include_once 'database/conn.php';
                    $con = DBConnect();
                    $select = DBQuery('cliente');
                    $linha = mysqli_fetch_assoc($select);
                    // calcula quantos dados retornaram
                    $total = mysqli_num_rows($select);
                    ?>
                    <div class="form-group ">
                        <label for="cliente">Cliente</label>

                        <select class="custom-select" id="cliente" name="cliente" required>
                            <option value="" selected> </option>
                            <?php
                            if($total > 0) {
                                do {
                            ?>
                            <option value="<?=$linha['idclient']?>"><?=$linha['nome']?></option>
                            <?php
                                }while($linha = mysqli_fetch_assoc($select));
                                // fim do if 
                            }
                            DBClose($con);
                            ?>        
                        </select>
                    </div>
                    <?php
                    $con = DBConnect();
                    $select = DBQuery('veiculo'," inner join modelo on modelo_idmodelo = idmodelo inner join categoria on categoria_idcategoria = idcategoria;",'idveiculo,modelo,categoria');
                    $linha = mysqli_fetch_assoc($select);
                    // calcula quantos dados retornaram
                    $total = mysqli_num_rows($select);
                    ?>
                    <div class="form-group ">
                        <label for="veiculo">Veículo</label>

                        <select class="custom-select" id="veiculo" name="veiculo" required>
                            <option value="" selected> </option>
                            <?php
                            if($total > 0) {
                                do {
                            ?>
                            <option value="<?=$linha['idveiculo']?>"><?=$linha['modelo']?> <?=$linha['categoria']?></option>
                            <?php
                                }while($linha = mysqli_fetch_assoc($select));
                                // fim do if 
                            }
                            DBClose($con);
                            ?>        
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control" name="dateInicial" id="dateInicial" required placeholder="R$ 000,00" maxlength="6" size="6">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="dateInicial">Data Inicial</label>
                            <input type="date" class="form-control" name="dateInicial" id="dateInicial" required placeholder="">
                        </div>
                        <div class="col-6">
                            <label for="dateFim">Data Fim</label>
                            <input type="date" class="form-control" name="dateFim" id="dateFim" required placeholder="">
                        </div>
                    </div>
                    <div class="input-group justify-content-end text-white py-2">
                        <input class="btn btn-outline-light btn-md btn-block m-0" name="alugar" type="submit" value="Alugar"> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>