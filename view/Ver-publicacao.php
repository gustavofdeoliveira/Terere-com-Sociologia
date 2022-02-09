<?php
include_once("../database/Connection.php");
require_once("../dao/UsuarioDao.php");
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicação | Tereré com Sociologia</title>
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
                                                    <a class='nav-link nav-meu-espaco' href='../view/'  role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                    Meu espaço</a>                  
                                                    <div class='wrapper'>
                                                        <div class='notification' >";
                                            $_SESSION['notificacao'] = array(0 => array('nome' => '@natan_pastore', 'texto' => 'comentou na sua publicação'), 1 => array('nome' => '@franco_harlos', 'texto' => 'respondeu o seu comentário'), 2 => array('nome' => '@ju_kashima', 'texto' => 'respondeu o seu comentário'), 3 => array('nome' => '@natan_pastore', 'texto' => 'comentou na sua publicação'), 4 => array('nome' => '@franco_harlos', 'texto' => 'respondeu o seu comentário'), 5 => array('nome' => '@ju_kashima', 'texto' => 'respondeu o seu comentário'));
                                            $numeroNotificacoes = count($_SESSION['notificacao']);
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
                <?php
                $usuario = $_SESSION["usuarioAutenticado"];
                if ($usuario != null) {
                    echo "
                    <div class='header-tools ion-ios-navicon pull-right'>
                        <i class='fa fa-cog' aria-hidden='true'></i>
                    </div> 
                    <div class='sidebar'>
                    <div class='sidebar-overlay animated fadeOut'></div>
                        <div class='sidebar-content'>
                            <p id='configuracao'>Configurações</p>";
                    if ($usuario['nivelAcesso'] == 3) {
                        echo "
                            <div class='nav-left'>
                                <a href='Meus-dados.php' class='btn-tools'><span class='ion-ios-home-outline'></span>Meus Dados</a>
                                <a class='btn-tools'><span class='ion-ios-list-outline'></span>Sugerir Termo</a>
                                <a class='btn-tools' id='dark-mode-toggle'><span class='ion-ios-list-outline'></span>
                                    <div class='d-flex modo-noturno'>
                                        <div class='texto-modo-noturno'>Modo noturno</div>
                                        <div class='dark-light'>
                                            <svg viewBox='0 0 24 24' stroke='currentColor' stroke-width='1.5' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                                                <path d='M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z' />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <a class='btn-tools' id='modalAvatar'><span class='ion-ios-list-outline'></span>Trocar Avatar</a> 
                                <a><span class='ion-ios-list-outline'></span>
                                    <form action='../control/UsuarioControl.php' method='POST' class='form-group'>
                                        <div class='d-flex pull-right btn-sair'>
                                            <input type='hidden' name='acao' value='sair'>
                                            <input class='input-sair' type='submit' value='Sair'>
                                            <i class='fa fa-sign-out' aria-hidden='true'></i>
                                        </div>
                                    </form>
                                </a>
                                
                            </div>";
                    }
                    if ($usuario['nivelAcesso'] == 1 || $usuario['nivelAcesso'] == 2) {
                        echo "
                            <div class='nav-left'>
                            <div id='texto-usuario'>Usuário</div>
                                <a href='view/Meus-dados.php' class='btn-tools'><span class='ion-ios-home-outline'></span>Meus Dados</a>";
                        if ($usuario['nivelAcesso'] == 1) {
                            echo "
                                <a href='view/Listar-usuarios.php' class='btn-tools'><span class='ion-ios-home-outline'></span>Listar Usuários</a>";
                        }
                        echo "
                                <a class='btn-tools' id='dark-mode-toggle'><span class='ion-ios-list-outline'></span>
                                    <div class='d-flex modo-noturno'>
                                        <div class='texto-modo-noturno'>Modo noturno</div>
                                        <div class='dark-light'>
                                            <svg viewBox='0 0 24 24' stroke='currentColor' stroke-width='1.5' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                                                <path d='M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z' />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <a class='btn-tools' id='modalAvatar'><span class='ion-ios-list-outline'></span>Trocar Avatar</a> 
                                <div id='texto-usuario'>Publicações</div>
                                <a href='Cadastrar-publicacao.php' class='btn-tools'><span class='ion-ios-list-outline'></span>+ Nova Publicação</a>
                                <a href='Listar-publicacao.php' class='btn-tools'><span class='ion-ios-list-outline'></span>Listar Publicações</a>
                                <div id='texto-usuario'>Termos</div>
                                <a href='Cadastrar-termo.php' class='btn-tools'><span class='ion-ios-list-outline'></span>+ Novo Termo</a>
                                <a href='Listar-termos.php' class='btn-tools'><span class='ion-ios-list-outline'></span>Listar Termos</a>
                                <a href='' class='btn-tools'><span class='ion-ios-list-outline'></span>Ver Sugestões</a>
                                <div id='texto-usuario'>Rede de Termos</div>
                                <a href='Cadastrar-rede-termo.php' class='btn-tools'><span class='ion-ios-list-outline'></span>+ Nova Rede</a>
                                <a href='Listar-redes.php' class='btn-tools'><span class='ion-ios-list-outline'></span>Listar Redes</a>
                                
                                <a><span class='ion-ios-list-outline'></span>
                                    <form action='../control/UsuarioControl.php' method='POST' class='form-group'>
                                        <div class='d-flex pull-right btn-sair'>
                                            <input type='hidden' name='acao' value='sair'>
                                            <input class='input-sair' type='submit' value='Sair'>
                                            <i class='fa fa-sign-out' aria-hidden='true'></i>
                                        </div>
                                    </form>
                                </a>
                                
                            </div>";
                    }
                    echo "</div>
                    </div>";
                }
                ?>
            </div>
        </div>
        <form action="../control/UsuarioControl.php" method="POST" class="form-group">
      <div class="col-xl-8 col-xl-offset-2 col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1" id="modal-avatar">
        <div class="row">
          <div class="col-xl-12">
            <button id="fechar-modal-avatar" type="button" class="btn-fechar-senha">X
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-10 col-xl-offset-1 col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
            <div class="row">
              <div class="col-xl-6 col-md-6 col-sm-12 col-lg-6 d-flex-smm">
                <p id="texto-avatar-atual">seu avatar atual:</p>
                <?php
                echo "
                  <img src='{$usuario['fotoAvatar']}' id='fotAvatar' alt='Foto de Perfil' class='rounded-circle img-trocar-avatar'>";
                ?>
              </div>
              <div class="col-xl-6 col-md-6 col-sm-12 col-lg-6">
                <p id="texto-trocar-foto">quer trocar de avatar?</p>
                <p id="texto-avatar-explicativo">clique no que você deseja usar.</p>
                <input type="hidden" id="fotoAvatar" name="fotoAvatar">
                <div class="row">
                  <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4" id="escolher-avatar" onclick="mudarAvatar(3)">
                    <img src='../image/avatares/Avatar-3.png' id='3' alt='Foto do Avatar'  class='rounded-circle img-icone-avatar'>
                    <p id="avatar-nome">Émile<br><span>Durkheim</span></p>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4" id="escolher-avatar" onclick="mudarAvatar(6)">
                    <img src='../image/avatares/Avatar-6.png' id='6' alt='Foto do Avatar' class='rounded-circle img-icone-avatar'>
                    <p id="avatar-nome">Max<br><span>Weber</span></p>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4" id="escolher-avatar" onclick="mudarAvatar(4)">
                    <img src='../image/avatares/Avatar-4.png' id='4' alt='Foto do Avatar' class='rounded-circle img-icone-avatar'>
                    <p id="avatar-nome">Karl<br><span>Marx</span></p>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4" id="escolher-avatar" onclick="mudarAvatar(5)">
                    <img src='../image/avatares/Avatar-5.png' id='5' alt='Foto do Avatar' class='rounded-circle img-icone-avatar'>
                    <p id="avatar-nome">Simone de<br><span>Beauvoir</span></p>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4" id="escolher-avatar" onclick="mudarAvatar(2)">
                    <img src='../image/avatares/Avatar-2.png' id='2' alt='Foto do Avatar' class='rounded-circle img-icone-avatar'>
                    <p id="avatar-nome">Auguste<br><span>Comte</span></p>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4" id="escolher-avatar" onclick="mudarAvatar(1)">
                    <img src='../image/avatares/Avatar-1.png' id='1' alt='Foto do Avatar' class='rounded-circle img-icone-avatar'>
                    <p id="avatar-nome">Zygmund<br><span>Bauman</span></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-12">
                    <input type="hidden" name="acao" value="atualizarAvatar">
                    <input class="btn-salvar-avatar btn btn-lg" type="submit" value="alterar avatar de perfil">
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </form>
    </header>
    <main id="telas-navbar">
        <div id="ver-publicacao">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12">
                            <p id="titulo-publicacao"></p>
                            <div class="row">
                                <p id="texto-resumo"></p>
                            </div>
                            <div class="row">
                                <div id="categoria-rede"></div>
                                <p id="categoria-publicacao"></p>
                            </div>
                            <div class="row">
                                <img id="img-publicacao" class="img-publicacao" src="">
                            </div>
                            <div class="row">
                                <p id="texto-publicacao"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="row">
                        <div id="publicacao-semelhantes">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../javascript/bootstrap.bundle.min.js">
    </script>
    <script src="../javascript/scripts.js"></script>
    <script src="../javascript/script-bell.js"></script>
    <script src="../ajax/scripts-ajax.js"></script>
</body>

</html>