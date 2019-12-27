<html>
  <head>
    <title>Inscrição Seletivo</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="shortcut icon" href="img/favicon.ico" /> 
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/jquery.toast.min.css">
  

  </head>
  <body>
    <script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.toast.min.js"></script>
    <script type="text/javascript" src="tooltip.js"></script>
  
    <script language='JavaScript'>
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}
</script>
    
    <div class="centerLogin">
      <form action="cadastrando.php">

          <div class="document-title">
            <h1>Seletivo</h1><br />
          </div>


        <br />

        <div class="row">
          <div class="form-group col-md-6">
            <label>Nome Completo</label><br />
            <input type="text" name="nome" class="form-control input-sm insert">
          </div>

          <div class="form-group col-md-3">
            <label>Sexo</label><br />
            <select class="form-control input-sm insert" name="sexo">
                <option value="">Selecione</option>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
            </select>
          </div>
          
            <div class="form-group col-md-3">
                <label>Nacionalidade</label>
                <input class="form-control" name="nacionalidade"><br><br>
            </div>
        </div>

        <div class="row">

        <div class="form-group col-md-3">
            <label>RG</label><br />
            <input type="text" name="rg" class="form-control input-sm insert" id="rg" maxlength="10" placeholder="00000000-0"><br / ><br />
          </div>
          
          <div class="form-group col-md-3">
            <label>Orgão expedidor</label><br />
            <input type="text" name="oe" class="form-control input-sm insert" id="oe" placeholder="SSP/MT"><br / ><br />
          </div>

        <div class="form-group col-md-6">
            <label>CPF</label><br />
            <input type="text" name="cpf" class="form-control input-sm ac mask_cpf insert" id="cpf" maxlength="14" placeholder="000.000.000-00"><br / ><br />
          </div>

        <div class="form-group col-md-3">
            <label>Nascimento</label><br />
            <input type="date" name="nascimento" class="form-control input-sm insert" id="nascimento"><br / ><br />
          </div>

          <div class="form-group col-md-4">
            <label>Estado civil</label><br />
            <select name="estado_civil" id="estado_civil" class="form-control input-sm insert">
                <option value="">Selecione</option>
                <option value="casado">Casado</option>
                <option value="casado">Solteiro</option>
                <option value="casado">Divorciado</option>
                <option value="casado">Amasiado</option>
                <option value="casado">Viúvo</option>
                <option value="casado">Outro</option>
            </select>
            <br / ><br />
          </div>

        </div>

        <div class="row">

          <div class="form-group col-md-3">
            <label>Telefone</label><br />
            <input type="text" name="telefone" class="form-control input-sm insert" onkeypress='return SomenteNumero(event)' maxlength="11" style="text-transform:uppercase">
          </div>

          <div class="form-group col-md-3">
            <label>Celular</label><br />
            <input type="text" name="celular" class="form-control input-sm insert" onkeypress='return SomenteNumero(event)' maxlength="11" style="text-transform:uppercase">
          </div>

          <div class="form-group col-md-6">
            <label>Email</label><br />
            <input type="text" name="email" class="form-control input-sm upper insert" style="">
          </div>

        </div>

        <div class="row">
            <div class="form-group col-md-2">
                <label>CEP</label>
                <input class="form-control insert" name="cep" placeholder="00000-000" maxlength="9"><br><br>
            </div>
            
            <div class="form-group col-md-5">
                <label>Endereço</label>
                <input class="form-control insert" name="endereco"><br><br>
            </div>
            
            <div class="form-group col-md-5">
                <label>Bairro</label>
                <input class="form-control insert" name="bairro"><br><br>
            </div>
            
            <div class="form-group col-md-2">
                <label>Número</label>
                <input class="form-control insert" name="numero"><br><br>
            </div>
            
            <div class="form-group col-md-5">
                <label>Cidade</label>
                <input class="form-control insert" name="cidade"><br><br>
            </div>
            
            <div class="form-group col-md-5">
                <label>Estado</label>
                <input class="form-control insert" name="estado"><br><br>
            </div>
        </div>

        <div class="row">
            <label>Função/Requisito básico</label><br />
              <select name="cargo" class="form-control input-sm insert">
                <option value="">Selecione</option>
                <option value="pedagogia)">PROFESSOR DE DISCIPLINAS PEDAGÓGICAS - (LICENCIATURA PLENA EM PEDAGOGIA)</option>
                <option value="professor de lingua portuguesa">PROFESSOR DE PORTUGUÊS - LICENCIATURA PLENA EM LETRAS OU LICENCIATURA PLENA EM LÍNGUA PORTUGUESA</option>
                <option value="professor de biologia">PROFESSOR DE BIOLOGIA - LICENCIATURA PLENA EM CIÊNCIAS BIOLÓGICAS</option>
                <option value="professor de quimica">PROFESSOR DE QUÍMICA - LICENCIATURA PLENA EM QUÍMICA OU LICENCIATURA PLENA EM CIÊNCIAS BIOLÓGICAS OU BACHARELADO EM ENGENHARIA</option>
                <option value="professor de fisica">PROFESSOR DE FÍSICA - LICENCIATURA PLENA EM FÍSICA OU LICENCIATURA PLENA EM MATEMÁTICA OU LICENCIATURA PLENA EM CIÊNCIAS BIOLÓGICAS OU BACHARELADO EM ENGENHARIA</option>
                <option value="professor de história">PROFESSOR DE HISTÓRIA - LICENCIATURA PLENA EM HISTÓRIA</option>
                <option value="professor de geografia">PROFESSOR DE GEOGRAFIA - LICENCIATURA PLENA EM GEOGRAFIA</option>
                <option value="professor de matematica">PROFESSOR DE MATEMÁTICA - LICENCIATURA PLENA EM MATEMÁTICA OU BACHARELADO EM ENGENHARIA</option>
                <option value="professor de filosofia">PROFESSOR DE FILOSOFIA - LICENCIATURA PLENA EM FILOSOFIA</option>
                <option value="professor de ingles">PROFESSOR DE INGLÊS - LICENCIATURA PLENA EM LETRAS COM HABILITAÇÃO EM INGLÊS OU LICENCIATURA PLENA EM LÍNGUA EM LÍNGUA PORTUGUESA COM HABILITAÇÃO EM INGLÈS</option>
                <option value="professor de direito">PROFESSOR DE DIREITO - BACHARELADO EM DIREITO</option>
                <option value="professor de espanhol">PROFESSOR DE ESPANHOL - LICENCIATURA PLENA EM LETRAS COM HABILITAÇÃO EM ESPANHOL</option>
              </select>
            </div>
        </div>
        <br />

        
        
        <div class="row">
          <div class="form-group col-md-12">
            <button type="button" class="btn btn-primary pull-right" id="cadastrar" style="margin-left: 10px;">Enviar Formulário</button>
            <button type="button" class="btn btn-warning pull-right" id="voltar">Voltar</button>
          </div>
        </div>


      </form>
    </div>
    

         <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
        </script>

    <script type="text/javascript" >
        $('#cpf').mask('###.###.###-##');
        function TestaCPF(strCPF) {
            var Soma;
            var Resto;
            Soma = 0;
          if 
            (strCPF == "00000000000")
            
            return false;
            
          for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
          Resto = (Soma * 10) % 11;
          
            if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
          
          Soma = 0; 
            for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;
          
            if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
            return true;
        }

        $('#cpf').blur(function(){
          var $this = $(this);
          cpf = $this.val();
          cpf = cpf.replace('.', '');
          cpf = cpf.replace('.', '');
          cpf = cpf.replace('.', '');
          cpf = cpf.replace('-', '');
          if(cpf){
            if(TestaCPF(cpf)){

            }else{
              $this.val('');
              alert('CPF Inválido');
            }
          }
          
        });

        function cadastrar(btnCadastro){
          $.ajax({
              url: 'cadastrando.php',
              type: 'post',
              dataType: 'json',
              data: $(".insert").serializeArray(),
              beforeSend: function(){
                  btnCadastro.button('loading');
              },
              success: function(data){
                  if(data.status){
                      toasts('success', 'Sucesso', 'Cadastrado com sucesso', 2000, function(){
                        window.location = "confirmacao.php";
                                                                                                                    
                      });
                  }else{
                      toasts('error', 'Erro no cadastro', data.msg);
                  }
              },
              complete: function(){
                  btnCadastro.button('reset');
              },
              error: function(jqXHR, textStatus, errorThrown){
                  toasts('error', 'Fatal error', jqXHR.responseText, 10000);
              }
          })
        }

        function toasts(type = '', title = '', msg = '', timer = 5000, callback = false){
            if(type && title && msg){
                $.toast({
                    heading: title,
                    text: msg,
                    position: 'top-right',
                    stack: false,
                    hideAfter: timer,
                    allowToastClose: false,
                    stack: 4,
                    icon: type,
                    afterHidden: callback
                });
            }else{
                console.log('Não foi parâmentros necessários para o toast');
            }
        }

        $("#voltar").click(function(){
          window.location = 'http://semeddivisaodeformacao.blogspot.com.br/';
        });

        $("#cadastrar").click(function(){
          var btnCadastro = $(this);
          cadastrar(btnCadastro);
        });
    </script>
  </body>
</html>

