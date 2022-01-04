<?php
require_once "../dao/UsuarioDao.php";
require_once "../model/UsuarioModel.php";
class UsuarioControl
{

    private $dao;
    private $modelo;
    private $acao;

    function __construct()
    {
        $this->dao = new UsuarioDao();
        $this->modelo = new UsuarioModel();

        $this->acao = $_REQUEST["acao"];
        $this->verificaAcao();
    }

    public function verificaAcao()
    {
        if ($this->acao) {
            if ($this->acao == "login") {
                $this->login();
            } elseif ($this->acao == "cadastro") {
                $this->cadastrarUsuario();
            }
        }
    }
    public function login()
    {
        try {
            $this->modelo->setNomeUsuario($_POST["nomeUsuario"]);
            $this->modelo->setSenha($_POST["senha"]);
            $this->modelo->setManterLogin($_POST["manterLogin"]);
            $this->dao->buscarUsuario($this->modelo);
            //Guarda os dados do usuario
            $usuario = $_SESSION['usuarioAutenticado'];
            //teste nivel de acesso do usuario
            if ($usuario['nivelAcesso'] == 1) {
                header("Location:../view/Dashboard-Administrativo.php");
            } else if ($usuario['nivelAcesso'] == 2) {
                header("Location:../view/Dashboard-Administrativo.php");
            } else if ($usuario['nivelAcesso'] === 3) {
                header("Location:../view/Dashboard-Usuario.php");
            }
        } catch (\Exception $e) {
            $_SESSION["msg_error"] = $e->getMessage();
            $_SESSION["tempo_msg_error"] = time();
            header("Location:../view/Login.php");
        }
    }
    public function cadastrarUsuario()
    {
        try {
            $this->modelo->setNomeCompleto($_POST["nomeCompleto"]);
            $this->modelo->setNomeUsuario($_POST["nomeUsuario"]);
            $this->modelo->setSenha($_POST["senha"]);
            $this->modelo->setEmail($_POST["email"]);
            $this->dao->inserirUsuario($this->modelo);
            header("Location:../view/CadastroFinalizado.php");
        } catch (\Exception $e) {
            $_SESSION["msg_error"] = $e->getMessage();
            $_SESSION["tempo_msg_error"] = time();
            header("Location:../view/Cadastrar.php");
        }
    }
}
new UsuarioControl();