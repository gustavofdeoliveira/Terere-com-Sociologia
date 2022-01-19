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
  <title> Sobre Nós | Tereré com Sociologia </title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/responsive-theme.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css.map">
  <link rel="stylesheet" href="../css/bootstrap.css.map">
  <link rel="shortcut icon" href="../image/Logo-claro.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body id="dark-mode">
  <header>
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 ">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="col-xl-3 col-md-4 col-sm-10 col-sm-offset-1 col-lg-3">
            <a class="navbar-brand" href="../index.php"><img id="img-logo" class="navbar-img-logo" src="../image/Logo-claro.png"></a>
          </div>
          <div class=" col-xl-9 col-md-8 col-sm-10 col-sm-offset-1 col-lg-9">
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
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 ">
        <nav class="navbar navbar-expand-lg w-100">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="../index.php">Início</a>
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
                      echo " 
                                            <li class='nav-item dropdown nav-meu-espaco'>
                                                <div class='d-flex'>
                                                    <img src='{$usuario['fotoAvatar']}' alt='Foto de Perfil' class='rounded-circle'>
                                                    <a class='nav-link dropdown-toggle nav-meu-espaco' href='#' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                    Meu espaço</a>
                                                    <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                                        <li><a class='dropdown-item' href='#'>Action</a></li>
                                                        <li><a class='dropdown-item' href='#'>Another action</a></li>
                                                        <li><button id='dark-mode-toggle' class='dropdown-item'>
                                                        <div class='d-flex'>
                                                        Modo noturno
                                                        <div class='dark-light'>
                                                        <svg viewBox='0 0 24 24' stroke='currentColor' stroke-width='1.5' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                                                        <path d='M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z' /></svg>
                                                        </div>
                                                        </div></button>
                                                        </li>
                                                        <li><form action='../control/UsuarioControl.php' method='POST' class='form-group'>
                                                        <div class='d-flex'>
                                                        <input type='hidden' name='acao' value='sair'>
                                                        <input class='dropdown-item input-sair' type='submit' value='Sair'>
                                                        <i class='fa fa-sign-out' aria-hidden='true'></i>
                                                        </div></form></li>
                                                    </ul>
                                                                       
                                                    <div class='wrapper'>
                                                        <div class='notification' >";
                      $_SESSION['notificacao'] = array(0 => array('nome' => '@natan_pastore', 'texto' => 'comentou na sua publicação'), 1 => array('nome' => '@franco_harlos', 'texto' => 'respondeu o seu comentário'), 2 => array('nome' => '@ju_kashima', 'texto' => 'respondeu o seu comentário'), 3 => array('nome' => '@natan_pastore', 'texto' => 'comentou na sua publicação'), 4 => array('nome' => '@franco_harlos', 'texto' => 'respondeu o seu comentário'), 5 => array('nome' => '@ju_kashima', 'texto' => 'respondeu o seu comentário'));
                      $numeroNotificacoes = 0;
                      if ($numeroNotificacoes) {
                        echo "<i class='fa fa-bell'></i> 
                                                            <div class='notify-count count1 common-count' count='{$numeroNotificacoes}'>
                                                                <div class='value numero-notificacoes'>{$numeroNotificacoes}</div>
                                                            </div>
                                                            ";
                      } else {
                        echo "<i class='fa fa-bell-o'></i>";
                      }
                      echo "</div>
                                                        <div class='notification-dropdown dd'>
                                                            <div class='header'>
                                                                <div class='container'>
                                                                    <div class='text fl'>Notificações</div>
                                                                </div>
                                                            </div>
                                                            <div class='items'>";
                      for ($i = 0; $i != count($_SESSION['notificacao']); $i++) {
                        $nome = $_SESSION['notificacao'][$i]['nome'];
                        $texto = $_SESSION['notificacao'][$i]['texto'];

                        echo "<div class='list-item noti'>
                                                                        <a id='noticacao-item' href='#' class='text fl'>
                                                                        <p class='name fl'>" . $nome . "<span id='texto-notificacao'>" . $texto . "</span></p></a></div>";
                      }
                      echo "</div></div></div></div>
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
          </div>
        </nav>
      </div>
    </div>
  </header>
  <main id="container">
    <div class="col-xl-12 col-lg-12">
      <div class="row">
        <div class="col-xl-8">
          <div class="row">
            <div class="col-xl-12 col-md-12">
              <p id="titulo-sobre-nos">Tudo sobre <span id="titulo-sobre-nos">sociologia</span><br>em um só lugar.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-xl-11 col-lg-offset-0">
              <p id="texto-sobre-descritivo">O <span id="texto-sobre-descritivo">Tereré com Sociologia</span> é um espaço criado para o aprendizado de sociologia de <span id="texto-sobre-descritivo">forma dinâmica, interativa e completa</span> pelos alunos do <span id="texto-sobre-descritivo">Informática 2018 do IFPR - Campus Foz do Iguaçu</span> junto do professor de sociologia <span id="texto-sobre-descritivo">Franco Harlos.</span>
              </p>
              <p id="texto-sobre-descritivo">Aqui, você estuda sociologia de forma personalizada, protagonizada por você mesmo e com possibilidades de interação entre diversos alunos e professores do Brasil. Tudo enquanto toma o seu tereré!
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-xl-offset-0 col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
          <div class="row">
            <div class="col-xl-12">
              <img src="../image/Foto-Franco.png" alt="Foto do Professor Autor" class="rounded-circle img-sobre-nos">
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <p id="texto-professor">Profº<span id="texto-professor"> Franco Harlos</span></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class=" col-sm-10 col-sm-offset-1 col-md-offset-0">
          <p id="texto-equipe">A equipe</p>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1">
          <div class="row">
            <img src="../image/Foto-Gustavo.png" alt="Foto do Aluno Autor" class="rounded-circle img-alunos-sobre-nos">
          </div>
          <div class="row">
            <p id="sobre-nos-nome">Gustavo Ferreira</p>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1">
          <div class="row">
            <img src="../image/Foto-Juliana.png" alt="Foto do Aluno Autor" class="rounded-circle img-alunos-sobre-nos">
          </div>
          <div class="row">
            <p id="sobre-nos-nome">Juliana Kashima</p>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1">
          <div class="row">
            <img src="../image/Foto-Natan.png" alt="Foto do Aluno Autor" class="rounded-circle img-alunos-sobre-nos">
          </div>
          <div class="row">
            <p id="sobre-nos-nome">Natan Pastore</p>
          </div>
        </div>

      </div>
    </div>
  </main>

  <script src="../javascript/bootstrap.bundle.min.js">
  </script>
  <script src="../javascript/scripts.js"></script>
  <script src="../javascript/jquery.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
</body>

</html>