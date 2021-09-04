<?php
/*
 *     E-cidade Software Publico para Gestao Municipal
 *  Copyright (C) 2009  DBSeller Servicos de Informatica
 *                            www.dbseller.com.br
 *                         e-cidade@dbseller.com.br
 *
 *  Este programa e software livre; voce pode redistribui-lo e/ou
 *  modifica-lo sob os termos da Licenca Publica Geral GNU, conforme
 *  publicada pela Free Software Foundation; tanto a versao 2 da
 *  Licenca como (a seu criterio) qualquer versao mais nova.
 *
 *  Este programa e distribuido na expectativa de ser util, mas SEM
 *  QUALQUER GARANTIA; sem mesmo a garantia implicita de
 *  COMERCIALIZACAO ou de ADEQUACAO A QUALQUER PROPOSITO EM
 *  PARTICULAR. Consulte a Licenca Publica Geral GNU para obter mais
 *  detalhes.
 *
 *  Voce deve ter recebido uma copia da Licenca Publica Geral GNU
 *  junto com este programa; se nao, escreva para a Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
 *  02111-1307, USA.
 *
 *  Copia da licenca no diretorio licenca/licenca_en.txt
 *                                licenca/licenca_pt.txt
 */

use ECidade\V3\Extension\Registry;

$clientId = Registry::get('app.config')->get('api.client.id');
$clientSecret = Registry::get('app.config')->get('api.client.secret');

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>e-Cidade</title>
  <meta charset="iso-8859-1">
  <meta http-equiv="Expires" CONTENT="0">

  <link href="imagens/ecidade/favicon.png" rel="icon" type="image/png" />
  <link href="estilos/jQueryUI/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css" />
  <script language="JavaScript" type="text/javascript" src="scripts/md5.js"></script>
  <script language="JavaScript" type="text/javascript" src="scripts/strings.js"></script>
  <script language="JavaScript" type="text/javascript" src="scripts/jquery-2.1.1.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="scripts/jquery-ui-1.10.4.custom.min.js"></script>
  <!-- Boostrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- fontawesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link href="estilos/login_demo.css" rel="stylesheet" type="text/css" />

</head>

<body class="<?php echo $sClassAtiva; ?>">

  <div class="container-fluid">

    <div class="row">

      <div class="col-md-6 noticia bg-site">

        <div class="text-center mt-5">
          <h2 class="text-uppercase">Plataforma de Gest&atilde;o Escolar</h2>
          <img class="rounded mx-auto  mt-5" src="imagens/ilustra-tecnologia.png" width="550" alt="Plataforma de Gest�o Escolar" />
        </div>
      </div>

      <div class="col-md-6 login">
        <div class="row">
          <div>
            <img class="rounded mx-auto d-block mt-3 " src="imagens/digitaleducar_logo.png" style="color: #0284DE;" width="250">
          </div>
        </div>
        <div class="row mx-5">
          <form control="" class="form-group" method="post" name="form1">



            <div class="access-fields">

              <?php if (isset($DB_CONEXAO)) {
              ?>

                <input id="servidor" name="servidor" type="hidden" value="<?= @$servidor ?>" />
                <input id="port" name="port" type="hidden" value="<?= @$port ?>" />
                <input id="user" name="user" type="hidden" value="<?= @$user ?>" />
                <input id="senh" name="senh" type="hidden" value="<?= @$senh ?>" />
                <input id="base" name="base" type="hidden" value="<?= @$base ?>" />

                <label>Host:</label>

                <select name="serv" id="serv">
                  <option name="condicaoservidor" value="">Selecione um servidor</option>

                  <?php for ($iInd = 0; $iInd < count($DB_CONEXAO); $iInd++) {
                  ?>
                    <option name="condicaoservidor" value="<?= $iInd ?>"><?= $DB_CONEXAO[$iInd]["SERVIDOR"] . ":" . $DB_CONEXAO[$iInd]["PORTA"] ?></option>
                  <?php
                  } ?>
                </select>

                <label>Base:</label>

                <div class="input" style="display:block;">
                  <input type="text" name="basename" id="basename" onclick="this.value=''" />
                  <input type="hidden" name="idbasename" id="idbasename" />
                </div>

              <?php
              } ?>
            </div>
            <div class="row mx-5">
              <input class="form-control form-input" name="login" id="usu_login" type="text" placeholder=" &#xf007;   Usu&aacute;rio" />
            </div>
            <div class="row mx-5">
              <input class="form-control form-input" name="senha" id="usu_senha" type="password" placeholder=" &#xf023;   Senha" />
            </div>
            <div id="captcha" class="container-captcha <?php echo ($lCaptcha ? '' : 'container-captcha-hide');
                                                        ?> ">
              <?php include('captcha.php');
              ?>
            </div>
            <div class="row justify-content-center mx5">

              <input class="btn" name="btnlogar" id="btnlogar" type="button" value="Entrar" />
            </div>
            <button name="btnloading" id="btnloading" class="btn-login" disabled style="display: none">
              <i class="fa fa-spinner fa-spin"></i>
            </button>

        </div>

        <div class="row mx-5">
          <div class="link-acesso">
           <?php echo ($lMostraLinkPrimeiroAcesso ? '<a href="primeiroAcesso.php"></a>' : ''); ?>
          </div>
          <span id="testaLogin"></span>


          <p class="text-center"><a href="http://www.digitaleducar.com.br">www.digitaleducar.com.br</a></p>
          <p class="text-center"></p>
          <div class="d-flex justify-content-center">
          </div>
        </div>
      </div>
      </form>

    </div>
</body>
<script src="scripts/classes/http/http.js"></script>
<script type="text/javascript">
  const btnLogar = document.getElementById('btnlogar');
  const btnLoading = document.getElementById('btnloading');
  btnLoading.style.backgroundColor = "#cacaca";
  btnLoading.style.borderColor = "#cacaca";

  $("#basename").autocomplete({
    source: function(request, response) {

      $.ajax({
        url: "BuscaBase.RPC.php",
        data: {
          string: $("#basename").val(),
          servidor: $("#serv").val()
        },
        type: "post",
        dataType: "json",
        success: function(data) {
          response($.map(data, function(item) {
            return {
              label: decodeURIComponent(item.label),
              value: decodeURIComponent(item.label),
              codigo: decodeURIComponent(item.cod)
            }
          }));
        }
      });
    },
    minLength: 3,
    select: function(event, ui) {

      if (ui.item.value == 0) {

        $('#basename').val('');
        return false;
      }

      aDadosConexao = decodeURIComponent(ui.item.codigo).split(':');

      $('#servidor').val(aDadosConexao[0]);
      $('#port').val(aDadosConexao[1]);
      $('#user').val(aDadosConexao[2]);
      $('#senh').val(tagString(aDadosConexao[3]));
      $('#base').val(aDadosConexao[4]);

      /**
       * Coloca o valor do label no campo
       */
      ui.item.value = ui.item.label;
    }
  });

  function js_acessar_dbportal() {

    btnLogar.style.display = 'none';
    btnLoading.style.display = '';

    const login = document.getElementById('usu_login').value;
    const senha = document.getElementById('usu_senha').value;

    const formData = new FormData();
    formData.append('username', login);
    formData.append('password', senha ? senha : '');
    formData.append('client_id', '<?php echo $clientId; ?>');
    formData.append('client_secret', '<?php echo $clientSecret; ?>');
    formData.append('grant_type', 'password');

    generateDatabase().then(response => {
      HttpClient.post('v4/oauth/token', {
          body: formData,
          reportProgress: false
        })
        .then(response => {
          localStorage.setItem('access_token', response.access_token);

          $('#testaLogin').html('');

          const sSenha = calcMD5(senha);
          const wname = `wname${Math.floor(Math.random() * 10000)}`;

          var sQuery = '';

          if ($('#servidor').length && $('#servidor').val() !== '') {
            sQuery += "&servidor=" + $('#servidor').val();
            sQuery += "&base=" + $('#base').val();
            sQuery += "&user=" + $('#user').val();
            sQuery += "&port=" + $('#port').val();
            sQuery += "&senha=" + $('#senh').val();
          }

          const oCaptcha = $('#captcha');
          const sAuth = btoa(`DB_login=${login}&DB_senha=${sSenha}`).urlEncode();
          const sUrl = 'abrir.php?sAuth=' + sAuth +
            ((oCaptcha) ? '&conteudoCaptcha=' + $('#ct_captcha').val() : '') +
            sQuery;

          $('#usu_senha').val('');

          window.open(sUrl, wname, `width=${screen.availWidth},height=${screen.availHeight}`);
          btnLogar.style.display = '';
          btnLoading.style.display = 'none';
        })
        .catch(response => {
          alert("Houve um erro ao se autenticar.");
          btnLogar.style.display = '';
          btnLoading.style.display = 'none';
        });
    });
  }

  // Função criada para popular o database com a base selecionada no login
  function generateDatabase() {
    const formData = new FormData();
    if ($('#servidor').length && $('#servidor').val() !== '') {

      formData.append('exec', 'setCookieDatabase');
      formData.append('servidor', $('#servidor').val());
      formData.append('base', $('#base').val());
      formData.append('port', $('#port').val());

      return HttpClient.post('login.rpc.php', {
        body: formData,
        reportProgress: false
      });
    } else {

      formData.append('exec', 'destroyCookieDatabase');

      return HttpClient.post('login.rpc.php', {
        body: formData,
        reportProgress: false
      });
    }
  }

  $(document).ready(function() {

    $('#btnlogar').on('click', function(event) {
      js_acessar_dbportal();
    });

    $('#usu_senha').on('keyup', function(event) {

      if (event.keyCode == 13) {
        js_acessar_dbportal();
      }
    });

    $('#ct_captcha').on('keyup', function(event) {

      if (event.keyCode == 13) {
        js_acessar_dbportal();
      }
    });

    $("#usu_login").focus();
    js_verifica_cookie();
  });

  $(window).load(function() {

    /**
     * Ajusta e posiciona o container do formulario
     */
    var iHeightDocumento = $(window).innerHeight(),
      iHeightContainer = $('.container').innerHeight();

    if ((iHeightDocumento - iHeightContainer) > 0) {

      $('.container').css({
        'top': parseInt((iHeightDocumento - iHeightContainer) / 2) + 'px',
        'margin-top': 0
      });
    }
  })
</script>

</html>
