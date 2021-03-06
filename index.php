<?php
require_once('banco/conn.php');

// faz o controle do periodo de inscrição
include 'scripts/periodo-inscricao.php';

?>

<!DOCTYPE html>
<html>

<!--Cabeçalho !-->

<head>
  <meta charset="UTF-8" />
  <title> Processo Seletivo 2020</title>
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
  <link type="text/css" rel="stylesheet" href="css/formatacao.css" />
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
  <link type="text/css" rel="stylesheet" href="css/jquery.toast.min.css">
  <script type="text/javascript" src="js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.toast.min.js"></script>
  <script type="text/javascript" src="js/tooltip.js"></script>
  <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
  <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"></script>

  <!-- CONSULTA CEP -->

  <script type="text/javascript">

    function limpa_formulário_cep() {
      //Limpa valores do formulário de cep.
      document.getElementById('endereco').value = ("");
      document.getElementById('bairro').value = ("");
      document.getElementById('cidade').value = ("");
      document.getElementById('estado').value = ("");
    }

    function meu_callback(conteudo) {
      if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('endereco').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('estado').value = (conteudo.uf);

      } //end if.
      else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
      }
    }

    function pesquisacep(valor) {

      //Nova variável "cep" somente com dígitos.
      var cep = valor.replace(/\D/g, '');

      //Verifica se campo cep possui valor informado.
      if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

          //Preenche os campos com "..." enquanto consulta webservice.
          document.getElementById('endereco').value = "...";
          document.getElementById('bairro').value = "...";
          document.getElementById('cidade').value = "...";
          document.getElementById('estado').value = "...";


          //Cria um elemento javascript.
          var script = document.createElement('script');

          //Sincroniza com o callback.
          script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

          //Insere script no documento e carrega o conteúdo.
          document.body.appendChild(script);

        } //end if.
        else {
          //cep é inválido.
          limpa_formulário_cep();
          alert("Formato de CEP inválido.");
        }
      } //end if.
      else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
      }
    };

    // MÁSCARA PARA DADOS
    $(document).ready(function() {
      $("#cpf").mask("999.999.999-99");
      //$("#rg").mask("9.999.999-9");
      $("#celular").mask("(99)99999-9999");
      $("#telefone").mask("(99)9999-9999");
    });

    // VALIDAÇÃO DE CPF
    function _cpf(cpf) {
      cpf = cpf.replace(/[^\d]+/g, '');
      if (cpf == '') return false;
      if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999")
        return false;
      add = 0;
      for (i = 0; i < 9; i++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
      rev = 11 - (add % 11);
      if (rev == 10 || rev == 11)
        rev = 0;
      if (rev != parseInt(cpf.charAt(9)))
        return false;
      add = 0;
      for (i = 0; i < 10; i++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
      rev = 11 - (add % 11);
      if (rev == 10 || rev == 11)
        rev = 0;
      if (rev != parseInt(cpf.charAt(10)))
        return false;
      return true;
    }
    function validarCPF(el) {
      if (!_cpf(el.value)) {

        alert("CPF inválido!");

        // apaga o valor
        el.value = "";
      }
    }

    // FUNÇÃO QUE VALIDA NÚMEROS DE TELEFONE
    function SomenteNumero(e) {
      var tecla = (window.event) ? event.keyCode : e.which;
      if ((tecla > 47 && tecla < 58)) return true;
      else {
        if (tecla == 8 || tecla == 0) return true;
        else return false;
      }
    }

    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
   
    $("#voltar").click(function() {
      window.location = 'http://semeddivisaodeformacao.blogspot.com.br/';
    });
   
  </script>
 
</head>

<body>
  <!-- Barra de navegação !-->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="#"><img src="img/logo2.png" style="width:50%"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" data-toggle="modal" data-target="#contato" href="#">Contato <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Seção Principal -->
  <p class="text-center mt-5 pt-3 formatacao_titulo"> Inscrição para Processo Seletivo - Docentes 2020 <?php echo $msg; ?> </p>
  <main class="formatacao_campos">
    <form action="<?php echo $link; ?>" method="post">
      <div class="container">
        <!-- Linha nome e sexo !-->
        <div class="row">
          <div class="col-md-8">
            <p class="m-0 text-left">Nome Completo: </p>
            <input type="text" name="nome" ID="nome" class="form-control mb-4 insert" required>
          </div>
          <div class="col-md-4">
            <p class="m-0 text-left">Sexo: </p>
            <select class="form-control mb-4 input-sm insert" name="sexo" id="sexo" required>
              <option value selected="selected">Selecione</option>
              <option value="masculino">Masculino</option>
              <option value="feminino">Feminino</option>
            </select>
          </div>
        </div>

        <!-- Linha cpf, rg e orgao expedidor !-->
        <div class="row">
          <div class="col-md-4">
            <p class="m-0 text-left">CPF:</p>
            <input type="text" name="cpf" id="cpf" class="form-control mb-4 ac mask_cpf insert" maxlength="14" placeholder="000.000.000-00" onblur="validarCPF(this)" required>

          </div>
          <div class="col-md-4">
            <p class="m-0 text-left">RG: </p>
            <input type="text" name="rg" id="rg" class="form-control mb-4 insert" maxlength="11" placeholder="00000000-0" required>
          </div>
          <div class="col-md-2">
            <p class="m-0 text-left">Órgão Expedidor:</p>
            <input type="text" id="oe" name="oe" class="form-control mb-4 insert text-uppercase" required>
          </div>
          <div class="col-md-2">
            <p class="m-0 text-left">UF Expedidor:</p>
            <input type="text" id="oeuf" name="oeuf" class="form-control mb-4 insert text-uppercase" maxlength="2" required>
          </div>
        </div>

        <!-- Linha nacionalidade, data de nascimento e estado civil !-->
        <div class="row">
          <div class="col-md-4">
            <p class="m-0 text-left">Nacionalidade:</p>
            <input type="text" name="nacionalidade" id="nacionaidade" class="form-control mb-4 insert" required>
          </div>
          <div class="col-md-4">
            <p class="m-0 text-left">Data de Nascimento: </p>
            <input type="date" name="nascimento" id="nascimento" class="form-control mb-4 insert" required>
          </div>
          <div class="col-md-4">
            <p class="m-0 text-left">Estado Civil:</p>
            <select class="form-control input-sm mb-4 insert" name="estado_civil" id="estado_civil" required>
              <option value selected="selected">Selecione</option>
              <option value="casado">Casado</option>
              <option value="solteiro">Solteiro</option>
              <option value="divorciado">Divorciado</option>
              <option value="amasiado">Amasiado</option>
              <option value="viuvo">Viúvo</option>
              <option value="outro">Outro</option>
            </select>
          </div>
        </div>

        <!-- Linha telefones e e-mail !-->
        <div class="row">
          <div class="col-md-4">
            <p class="m-0 text-left">Telefone Residencial:</p>
            <input type="text" name="telefone" id="telefone" class="form-control mb-4 insert" maxlength="11" style="text-transform:uppercase" onkeypress="return SomenteNumero(event)">
          </div>
          <div class="col-md-4">
            <p class="m-0 text-left">Telefone Celular: </p>
            <input type="text" name="celular" id="celular" class="form-control mb-4 insert" maxlength="11" style="text-transform:uppercase" onkeypress="return SomenteNumero(event)" required>
          </div>
          <div class="col-md-4">
            <p class="m-0 text-left">E-mail:</p>
            <input type="email" name="email" id="email" class="form-control mb-4 insert" required>
          </div>
        </div>

        <!-- Linha cep, endereço e número !-->
        <div class="row">
          <div class="col-md-2">
            <p class="m-0 text-left">CEP:</p>
            <input type="text" name="cep" id="cep" class="form-control mb-4 insert" placeholder="00000-000" maxlength="9" required onblur="pesquisacep(this.value);">
          </div>
          <div class="col-md-8">
            <p class="m-0 text-left">Endereço: </p>
            <input type="text" name="endereco" id="endereco" class="form-control mb-4 insert" required readonly>
          </div>
          <div class="col-md-2">
            <p class="m-0 text-left">Número:</p>
            <input type="number" name="numero" id="numero" class="form-control mb-4 insert" required>
          </div>
        </div>

        <!-- Linha bairro, cidade e estado !-->
        <div class="row">
          <div class="col-md-4">
            <p class="m-0 text-left">Bairro:</p>
            <input type="text" name="bairro" id="bairro" class="form-control mb-4 insert" required readonly>
          </div>
          <div class="col-md-6">
            <p class="m-0 text-left">Cidade: </p>
            <input type="text" name="cidade" id="cidade" class="form-control mb-4 insert" required readonly>
          </div>
          <div class="col-md-2">
            <p class="m-0 text-left">Estado:</p>
            <input type="text" name="estado" id="estado" class="form-control mb-4 insert" required readonly>
          </div>
        </div>

        <hr>

        <!-- Linha função / cargo !-->
        <div class="row">
          <div class="col-md-12">
            <p class="m-0 text-left">Função:</p>
            <select name="cargo" id="cargo" class="form-control input-sm insert">
              <option value="">Selecione</option>
              <?php
              $sql = "SELECT idCargo, cargo, ativo FROM seletivoeducacao2020_cargo WHERE ativo = 'S' ORDER BY cargo ASC";
              $consulta = $mysqli->query($sql);
              while ($linha = $consulta->fetch_array()) {
                echo '<option value="' . $linha['idCargo'] . '">' . $linha['cargo'] . '</option>';
              }
              ?>
            </select>
          </div>
        </div>

        <br>

        <!-- Linha função / cargo !-->
        <div class="row">
          <div class="col-md-12">
            <p class="m-0 text-left">Cargo:</p>
            <select name="cargo" id="cargo" class="form-control input-sm insert">
              <option value="">Selecione</option>
              
            </select>
          </div>
        </div>

        <div class="row">
          <div class="m-4 p-5 form-group col-md-12 text-center">
            <button type="reset" class="btn btn-warning" id="limpar">Limpar</button>
            <button type="submit" class="btn btn-primary" id="cadastrar" <?php echo $disabled; ?>><?php echo $txtBtn; ?></button>
          </div>
        </div>
      </div>
    </form>

  </main>

  <!-- Modal para contato  !-->
  <div class="modal fade" id="contato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dúvidas ou maiores informações</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Para maiores informações: (66) 3333-3333
          <br>Falar com AAAAAA.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Rodapé da página !-->
  <footer>
    <div class="container-fluid d-flex bg-secondary py-3 justify-content-center align-items-center">
      <p class="text-light text-decoration-none p-0 m-0">Secretaria Municipal de Educação</p>
    </div>
  </footer>

</body>

</html>

<?php mysqli_close($mysqli); ?>