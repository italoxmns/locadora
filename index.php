<?php
include_once 'public/layout/layout.php';
session_start();
if(isset($_SESSION['usuarioLog'])){
    header('location: admin.php');
    die();
}
?>
<section class="container-fluid pt-5 my-4" >
    <div class="row text-white" id="divCarousel">
        <div class="col-lg-6 p-0">
            <div id="carouselCars" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselCars" data-slide-to="0" class="active" id="list"></li>
                    <li data-target="#carouselCars" data-slide-to="1" id="list"></li>
                    <li data-target="#carouselCars" data-slide-to="2" id="list"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="public/img/car1.jpg" class="d-block w-100" alt="Car 1">
                    </div>
                    <div class="carousel-item">
                        <img src="public/img/car2.jpg" class="d-block w-100" alt="Car 2">
                    </div>
                    <div class="carousel-item">
                        <img src="public/img/car3.jpg" class="d-block w-100" alt="Car 3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselCars" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselCars" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-6 p-0">
            <?php
            include_once 'public/layout/menuCarousel.php';
            include_once 'modal/login.php';
            include_once 'modal/register.php';
            ?>
            <div class="col-sm-12 p-sm-4">
                <h2 class="d-flex-sm display-4">Alugue seu veículo!</h2>
                <p class="lead text-justify pt-4">
                    O melhor lugar para alugar um veículo, temos mais de 100 tipos de veículos. Planos coletivos, exclusívos e indivíduais.
                </p>
                <form action="" class=" d-none d-sm-block">
                    <div class="input-group input-group-md pt-4">
                        <input type="text" class="form-control" placeholder="e-mail" aria-label="email" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" id="btnCarousel" type="button" >Inscreva-se</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>




