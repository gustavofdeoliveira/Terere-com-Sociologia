<?php
include_once __DIR__ . "../../database/Connection.php";
require_once __DIR__ . "../../dao/PublicacaoDao.php";
require_once __DIR__ . '../../components/header.php';
require_once __DIR__ . '../../components/balao-rede.php';
require_once __DIR__ . '../../components/select-categoria.php';
require_once __DIR__ . '../../control/TermoControl.php';
require_once __DIR__ . '../../components/footer.php';
require_once __DIR__ . '../../components/mensagem.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Publicação | Tereré com Sociologia</title>
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
  <?= head() ?>
  <?php $publicacao = $_SESSION['publicacao']; ?>
  <main id="telas-navbar">
    <form action="../control/PublicacaoControl.php" onsubmit="validaFormularioPublicacao(event)" method="POST" enctype="multipart/form-data" class="form-group">
      <div class="row">
        <div class="col-xl-12">
          <p id="titulo-criar-publicacao">editar publicação</p>
          <?= setMensagens()?>
          <div class="row">
            <div class="col-xl-12">
              <div class="form-group">
                <label class="form-label label-criar-publicacao" for="titulo">título*</label>
                <div class="input-group">
                  <input required onkeyup="validaCampoPublicacao(titulo)" class="input-criar-conta form-control" type="text" id="titulo" name="titulo" value="<?php echo $publicacao[0]['titulo'] ?>" disabled>
                  <i class="editar-publicacao fa fa-pencil-square-o" aria-hidden="true" onclick="ativaCampo(titulo)"></i>
                  <div class="d-flex w-100">
                    <span id="error-obrigatorio" class="error"></span>
                    <span id="error-titulo" class="mensagem-caracters"></span>
                    <span id="error-titulo-caracters" class="error-titulo-caracters pull-right">0/255</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-6 col-lg-6">
              <div class="form-group" x-data="{ fileName: '' }">
                <label class="form-label label-criar-categoria" for="imagem">imagem <span id="texto-opcional">(opcional)</span></label>
                <div class="input-group">
                  <input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="imagem" id="imagem" class="d-none">
                  <input type="text" class="input-imagem form-control form-control-lg" x-model="fileName">
                  <button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fa fa-image"></i> Carregar</button>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="input-group">
                <label class="form-label label-criar-categoria" for="categoria">categoria*</label>
                <?= verificaSelect() ?>
                <span id="error-categoria" class="error"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="form-group">
                <label class="form-label label-criar-publicacao" for="resumo">resumo*</label>
                <div class="input-group">
                  <textarea onkeyup="validaCampoPublicacao(resumo)" class="textarea input-criar-conta form-control" type="text" id="resumo" name="resumo" value="<?php echo $publicacao[0]['resumo'] ?>" disabled><?php echo $publicacao[0]['resumo'] ?></textarea>
                  <i class="editar-publicacao fa fa-pencil-square-o" aria-hidden="true" onclick="ativaCampo(resumo)"></i>
                  <div class="d-flex w-100">
                      <span id="error-comentario" class="mensagem-caracters"></span>
                      <span id="error-comentario-caracters" class="error-titulo-caracters pull-right">0/300</span>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="form-group">
                <label class="form-label label-criar-publicacao" for="redeTermos">rede de termos <span id="texto-opcional">(opcional)</span></label>

                <div class="input-group">
                  <input class="input-criar-conta form-control" type="text" id="redeTermos" onkeyup="carrega_redes(this.value)" name="redeTermos">
                  <span id="resultado_pesquisa"></span>
                  <div class="rede-container" id="termos-container"><?= retornaBalao(); ?></div>
                  <p id="texto-alerta">deixar esse campo vazio pode reduzir o alcance da sua publicação</p>
                  <input type="hidden" name="rede" class="form-control" value="<?php print_r($_SESSION['id_rede'])?>" id="rede">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="form-group">
                <label class="form-label label-criar-publicacao" for="termos">texto*</label>
                <p id="instrucao">Caro professor, para adicionar termos da nossa Biblioteca à sua publicação você deve:</p>
                <p id="instrucao-passos">1 - selecionar a parte do seu texto que se refere ao termo | 2 - clicar neste botão <i class="fa fa-link"></i> | 3 - buscar o termo que você quer e clicar em salvar!</p>
                <div class="input-group">
                  <input class=" form-control" type="hidden" id="termosId" name="termosId" value="<?php for($a=0;$a!=count($_SESSION['id_termos']);$a++){ echo $_SESSION['id_termos'][$a].",";} ?>">
                  <input class=" form-control" type="hidden" id="texto_publicacao" name="texto_publicacao"><div class="form-control" type="text" id="textoArea" name="textoArea" innerHTML=''><?php echo $publicacao[0]["texto"]; ?>
                  </div>
                </div>
                <div class="d-flex w-100">
                      <span id="error-texto" class="mensagem-caracters"></span>
                      <span id="error-texto-caracters" class="error-titulo-caracters pull-right">0</span>
                    </div>
              </div>
            </div>
          </div>
          <div class="row">
            <p id="text-revisar-publicacão">revise seus textos antes<br>de salvar suas alterações</p>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-8 col-lg-6 col-lg-offset-3 col-xl-4 col-xl-offset-4 col-sm-offset-2 col-md-offset-3">
              <input type="hidden" name="acao" value="editarPublicacao">
              <input class="btn-publicar btn btn-lg" type="submit"  onclick="validaSubmiti()" value="publicar">
            </div>
          </div>
        </div>
      </div>
    </form>
  </main>
  <?= setFooter() ?>
  <script src="../plugins/build/ckeditor.js"></script>
  <script src="../plugins/build/ckeditor.js.map"></script>
  <script src="../ajax/scripts-ajax.js"></script>

  <script src="../javascript/bootstrap.bundle.min.js"></script>
  <script src="../javascript/scripts.js"></script>
  <script src="../javascript/script-bell.js"></script>
  <script>
    ClassicEditor
      .create(document.querySelector('#textoArea'), {
        licenseKey: '',
      })
      .then(editor => {
        window.editor = editor;
        console.log(window.editor);
      })
      .catch(error => {
        console.error('Oops, something went wrong!');
        console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
        console.warn('Build id: cuyvxs49p0ly-mzl2w7i12yeq');
        console.error(error);
      });
    var edt = ClassicEditor.replace('textoArea', {
      toolbar: 'Basic'
    });
    CKFinder.setupCKEditor(edt, '/ckfinder/');
    CKEDITOR.instances.editor1.setData(t);
  </script>
</body>
<script src="../ajax/scripts-ajax.js"></script>

</html>