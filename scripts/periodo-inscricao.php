<?php

// trata o periodo de inscricao
date_default_timezone_set('America/Cuiaba'); // define o timezone
$dataAtual  = date('Y-m-d H:i:s'); // data atual
$dataLimite = '2020-01-05 23:59:59'; // data que expira
$verificaDataLimite = strtotime($dataAtual) > strtotime($dataLimite); // transforma em numero para comparação

if ($verificaDataLimite) { // se for TRUE irá preparar a pagina para exibir msg de encerramento
  echo '<script>alert("Periodo de inscricoes encerrado")</script>'; // alerta
  $link = ''; // remove link de envio
  $disabled = 'disabled'; // desativa o botão
  $txtBtn = 'Encerrado';
  $msg = '<span style="color:red">(ENCERRADO)</span>'; //exibe mensagem no titulo
} else { // se FALSE, pagina fica ativa
  $link = 'cadastro.php';
  $disabled = '';
  $txtBtn = 'Realizar inscri&ccedil;&atilde;o';
  $msg = '';
}