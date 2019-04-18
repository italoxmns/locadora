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
include_once 'modal/editClient.php';
include_once 'modal/deleteClient.php';

$con = DBConnect();
// seleciona a base de dados em que vamos trabalhar
$select = DBQuery('cliente',' order by nome asc');

$linha = mysqli_fetch_assoc($select);
// calcula quantos dados retornaram
$total = mysqli_num_rows($select);
?>

<!--        conteudo-->
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-sm-10 ">
            <div class="row py-2">
                    <div class="col-12 text-center py-2">
                        <h5 class="display-4">Demanda de Clientes </h5>
                    </div>
                <div class="col-12 p-1 m-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <!-- Table row -->
                                <th scope="col">ID</th>
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
                                    <?=$linha['idclient']?>
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
                                    <a class="btn rounded" href="" id="option" data-toggle="modal" data-target="#update">
                                        <i class="fas fa-user-edit fa-md"></i>
                                    </a>
                                    <a class="btn rounded" href="" id="option" data-toggle="modal" data-target="#delete">
                                        <i class="fas fa-user-minus fa-md"></i>
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
</div>