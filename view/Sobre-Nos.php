<?php
/*Incluir a conecao com o bd sempre*/
include_once __DIR__ . '../../database/Connection.php';
require_once __DIR__ . '../../dao/UsuarioDao.php';
require_once __DIR__ . '../../components/header.php';
require_once __DIR__ . '../../components/footer.php';
require_once __DIR__ . '../../components/mensagem.php';
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
  <script src="../javascript/jquery.js"></script>
  <script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
  <script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js'></script>
</head>


<body id="dark-mode">
  <?= head()?>
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
  <?= setFooter()?>
  
  <script src="../javascript/bootstrap.bundle.min.js"></script>
  <script src="../javascript/scripts.js"></script>
  <script src="../javascript/script-bell.js"></script>
  <script src="../ajax/scripts-ajax.js"></script>
</body>

</html>