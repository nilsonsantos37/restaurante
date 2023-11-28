<?php 
session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <script src="main.js"></script>
    <title>MegaDelivery</title>
</head>

<body>
    <!-- Navbar Inicial -->

    <div class="container position-relative">
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="" class="navbar-brand">
                <h1 class="m-0 display-5 text-white">
                    <span class="text-primary"></span>MEGA DELIVERY
                </h1>

            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-home"></i>Home</a>
                  <a href="pedido.php" class="nav-item nav-link"><i class="fa fa-file-text"></i>Pedido</a>
                    <a href="produto.php" class="nav-item nav-link active"><i class="fa fa-shopping-cart"></i>Produto</a>
                    <a href="usuario.php" class="nav-item nav-link active"><i class="fa fa-user-circle"></i>Cadastrar Usuario</a>
                    <a href="login.php" class="nav-item nav-link"><i class="fa fa-sign-in"
                            aria-hidden="true"></i>Login</a>
                  <a href="logout.php" class="nav-item nav-link"><i class="fa fa-sign-out"
                            aria-hidden="true"></i>Exit</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar Final -->
    <!-- Início Serviços -->

    <div class="models">
        <div class="food-item">
            <a href="">
                <div class="food-item--img"><img src=""/></div>
            </a>
            <div class="food-item--price">R$ --</div>
            <div class="food-item--name">--</div>
            <div class="food-item--desc">--</div>
        </div>
        </div>
    </div>
        <main>
        <h1 class="restaurant-title">Cardápio</h1>
        <div class="food-area"></div>
    </main>

     </div>
    </div>


    <!-- Rodapé Inicio -->
    <div class="container bg-dark py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Entre em Contato</h4>
                <p>
                    <i class="fa fa-map-marker-alt mr-2"></i>Alameda dos Cristais,
                    Lourdes, Belo Horizonte/MG
                </p>
                <p><i class="fa fa-phone-alt mr-2"></i>031 1234-6789</p>
                <p><i class="fa fa-envelope mr-2"></i>MegaDelivery@gmail.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" href="https://www.facebook.com"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" href="https://www.instagram.com/"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="container border-top border-secondary pt-5">
            <p class="m-0 text-center text-white">
                &copy<a class="text-white font-weight-bold" href="#">Mega Delyvery</a>Todos os Direitos Reservado.
            </p>
        </div>
    </div>
    <!-- Rodapé Fim -->
    <!-- Voltar ao Início -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- Bibliotecas do JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
 <script src="js/main.js"></script>
    <script type="text/javascript" src="./js/alimentos.js"></script>
    <script type="text/javascript" src="./js/script.js"></script>
</body>

</html>