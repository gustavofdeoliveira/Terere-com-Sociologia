<?php
include_once __DIR__ . '../../database/Connection.php';
require_once __DIR__ . '../../dao/UsuarioDao.php';
require_once __DIR__ . '../../components/mensagem.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Esqueceu a sua senha? | Tereré com Sociologia </title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive-theme.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css.map">
    <link rel="stylesheet" href="../css/bootstrap.css.map">
    <link rel="shortcut icon" href="../image/Logo-claro.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="background-login">

    <main>

        <div class="col-sm-12 col-xl-12 col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6 login-fundo-branco">
                    <div class="row all-conteudo">
                        <div class="col-xl-6 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-1 col-md-9 col-md-offset-1 col-xl-offset-2">
                            <img id="img-logo" class="img-logo-cadastrar" src="../image/Logo-claro.png">
                        </div>
                    </div>
                    <form action="../control/UsuarioControl.php" method="POST" class="form-group">
                        <div class="row">
                            <div class="col-xl-8 col-xl-offset-2 col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
                                <p id="esqueceu-senha">esqueceu<br>a sua senha?</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8 col-xl-offset-2 col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <label class="form-label label-criar-conta" for="email">e-mail de recuperação</label>
                                    <div class="input-group">
                                        <input required class="input-criar-conta form-control" type="text" name="email">
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= setMensagens()?>
                        <input name="theme" type="checkbox" class="toggle-dark-mode" />
                        <div class="row btn-espacamento">
                            <div class="col-lg-6 col-lg-offset-1 col-md-offset-1 col-md-10 col-xl-8 col-xl-offset-2 col-sm-12 col-sm-offset-0">
                                <div class="row">
                                    <div class="col-sm-12 col-sm-offset-0 col-md-offset-0 col-md-8 col-xl-5 col-lg-12 col-lg-offset-0 col-xl-offset-0">
                                        <input type="hidden" name="acao" value="recuperar">
                                        <input class="btn-enviar-email btn btn-lg" type="submit" value="enviar e-mail">
                                    </div>

                                </div>

                            </div>
                            <div class="col-xl-8 col-xl-offset-2 col-lg-8 col-lg-offset-1 col-sm-10 col-sm-offset-1">
                                <p id="texto-instrucao">um e-mail com <span id="texto-instrucao">instruções</span> para<br>recuperar a sua senha será enviado</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8 col-xl-offset-2 col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-0">
                                <a href="../index.php" id="pagina-inicial">voltar para a página inicial</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 d-none d-sm-block col-md-6 col-xl-6 col-lg-6 login-right d-none d-sm-block">
                    <div class="col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                        <p id="titulo-esqueceu-senha">Vivemos<br>tempos<br>líquidos.<br>Nada é para<br>durar.</p>
                    </div>

                    <img class="img-esqueceu" src="../image/Bg-Esqueceu-Senha-Claro.png">
                </div>


            </div>
        </div>
    </main>
    <script src="../javascript/bootstrap.bundle.min.js"></script>
    <script src="../javascript/bootstrap.bundle.min.js.map"></script>
    <script src="../javascript/scripts.js"></script>
    <script src="../javascript/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
</body>

</html>