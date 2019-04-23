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
include_once 'modal/aluguel.php';
include_once 'modal/recuse.php';

$con = DBConnect();
// seleciona a base de dados em que vamos trabalhar
$select = DBQuery('cliente',' order by nome asc');

$linha = mysqli_fetch_assoc($select);
// calcula quantos dados retornaram
$total = mysqli_num_rows($select);
?>

<!--        conteudo-->
<section class="container py-2">
    <div class="row justify-content-center">
        <div class="col-sm-10 ">
            <div class="row py-2">
                    <div class="col-12 text-center py-2">
                        <h1>Demanda de Clientes </h1>
                    </div>
                <div class="col-12 p-1 m-0">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <!-- Table row -->
                                <th scope="col"><i class="fas fa-check fa-md"></i></th>
                                <!-- Table header -->
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Data</th>
                                <th scope="col">Config.</th>
                            </tr>
                        </thead>
                        <?php
                        // se o número de resultados for maior que zero, mostra os dados
                        if($total > 0) {
                            // inicia o loop que vai mostrar todos os dados
                            do {

                        ?>
                        <tbody>
                            <tr>
                                <th scope="col">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="radioGroup<?=$linha['idclient']?>" name="groupOfDefaultRadios">
                                    <label class="custom-control-label" for="radioGroup<?=$linha['idclient']?>"></label>
                                </div>
                                </th>
                                <!-- Table data -->
                                <td>
                                    <?=$linha['nome']?>
                                </td>
                                <td>
                                    <?=$linha['email']?>
                                </td>
                                <td>
                                    <?=$linha['telefone']?>
                                </td>
                                <td>
                                    <?=$linha['date']?>
                                </td>
                                <td>
                                    <a class="btn rounded" href="" id="option" data-toggle="modal" data-target="#delete">
                                        <i class="fas fa-times fa-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                            // finaliza o loop que vai mostrar os dados
                            }while($linha = mysqli_fetch_assoc($select));
                            // fim do if 
                        }
                        DBClose($con);
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>