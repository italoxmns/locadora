<!--        Menu-->

<header>
    <div class="container my-0 pb-2">
        <div class="row justify-content-center py-2 ">
            <div class="col-10 justify-content-start ">
                <div class="row">
                    <div class="col-3 ml-0 pl-0">
                        <a class="btn mx-1" href="admin.php" role="button">
                            <i class="fas fa-home"></i>
                            Página Inicial
                        </a>                 
                    </div>
                    <div class="col-9">
                        <div class="row justify-content-end">
                            <a class="btn mx-1" role="button" href="" data-toggle="modal" data-target="#aluguel">
                                <i class="fas fa-cart-plus"></i>
                                &nbsp;Alugar</a>
                            <a class="btn mx-1" href="veiculosDisponiveis.php" role="button" >
                                <i class="fas fa-car-side"></i>
                                &nbsp;Veiculos Disponíveis
                                </a>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuCadastro" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cash-register"></i>  
                                    &nbsp;Cadastro
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuCadastro">
                                    <a class="dropdown-item ml-0" href="cliente.php">
                                        <i class="far fa-address-card"></i>
                                        &nbsp;Cadastar Cliente
                                    </a>
                                    <a class="dropdown-item ml-0" href="veiculo.php">
                                        <i class="fas fa-car"></i>
                                        &nbsp;Cadastrar Veiculo
                                    </a>
                                </div>    
                            </div>
                            <div class="dropdown pl-1 text" id="logoff">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="far fa-user"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="profile.php">
                                        <i class="fas fa-user-cog"></i>
                                        &nbsp;Perfil
                                    </a>
                                    <a class="dropdown-item" href="?sair" >
                                        <i class="fas fa-sign-out-alt"></i>
                                        &nbsp;Sair
                                    </a>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>