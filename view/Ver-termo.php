<?php
include_once __DIR__ . '../../database/Connection.php';
require_once __DIR__ . '../../dao/TermoDao.php';
require_once __DIR__ . '../../components/header.php';
require_once __DIR__ . '../../components/footer.php';
require_once __DIR__ . '../../components/ver-termo.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?=titleTermo()?> | Tereré com Sociologia</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/responsive-theme.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css.map">
  <link rel="stylesheet" href="../css/bootstrap.css.map">
  <link rel="shortcut icon" href="../image/Logo-claro.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="../javascript/jquery.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

</head>
<body id="dark-mode">
  <?= head() ?>
  <main id="telas-navbar">
    <form action="../control/TermoControl.php" method="POST" class="form-group">
      <div id="ver-termo">
        <?=setTermo()?>
      </div>
    </form>
  </main>
  <?= setFooter() ?>
  <script src="../javascript/bootstrap.bundle.min.js">
  </script>
  <script src="../javascript/scripts.js"></script>
  <script src="../javascript/script-bell.js"></script>
  <script src="../ajax/scripts-ajax.js"></script>
</body>

</html>