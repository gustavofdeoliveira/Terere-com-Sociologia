<?php
/*Incluir a conecao com o bd sempre*/
include_once("../database/Connection.php");
require_once("../dao/UsuarioDao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tererê com Sociologia | Dashboard</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/responsive-theme.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css.map">
  <link rel="stylesheet" href="../css/bootstrap.css.map">
  <link rel="shortcut icon" href="../image/Logo-claro.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
  <header>
    <div class="col-xl-12">
      <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="col-xl-3 col-md-5 col-sm-10 col-sm-offset-1 col-lg-4">
            <a class="navbar-brand" href="#"><img class="navbar-img-logo" src="../image/Logo-claro.png"></a>
          </div>
          <div class=" col-xl-8 col-md-7 col-sm-10 col-sm-offset-1 col-lg-7">
            <form class="d-flex">
              <div class="input-group input-group-navbar">
                <span class="input-group-text span-icon-buscar" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input type="text" class="navbar-input-busca form-control" placeholder="descubra algo incrível..." aria-describedby="basic-addon1">
              </div>
              <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
            </form>
          </div>

        </nav>
        <hr>
      </div>
    </div>
    <div class="col-xl-12">
      <div class="row">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <div class="col-xl-12 col-lg-12">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Início</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">Linha do Tempo</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="../view/Sobre-Nos.php">Sobre Nós</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">Biblioteca</a>
                  </li>
                  <?php
                  if (!empty($_SESSION["usuarioAutenticado"])) {
                    $usuario = $_SESSION["usuarioAutenticado"];
                    echo " <li class='nav-item dropdown'>
                    <div class='d-flex'>
                      <img src='{$usuario['fotoPerfil']}' alt='Foto de Perfil' class='rounded-circle'>
                      <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        Meu espaço
                      </a>
                      <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <li><a class='dropdown-item' href='#'>Action</a></li>
                        <li><a class='dropdown-item' href='#'>Another action</a></li>
                        <li><a class='dropdown-item' href='#'>Something else here</a></li>
                      </ul>
                      <div class='bell'>
                        <i class='fa fa-bell-o' aria-hidden='true'></i>
                      </div>
                    </div>
                  </li>";
                  } ?>
                  <?php
                  if (empty($_SESSION["usuarioAutenticado"])) {
                    echo "
                    <li class='nav-item'>
                    <a class='nav-link btn-navbar-login' href='../view/Login.php'>Fazer Login</a>
                  </li>";
                  } ?>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>

  </header>
  <main>

  </main>

  <script src="../javascript/bootstrap.bundle.min.js">
  </script>
  <script src="../javascript/scripts.js"></script>
  <script src="../javascript/jquery.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
</body>

</html>