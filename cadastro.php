<?php

require_once('banco/conn.php');

// dados conexão antigo
// $host = "mysql.hostinger.com.br";
// $user = "u652146223_dfpms";
// $pass = "semed2017";
// $banco = "u652146223_cadas";
// error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
// $conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
// mysql_select_db($banco);
// header('Content-Type: text/html; charset=utf-8');
// mysql_connect($host, $user, $pass);
// mysql_select_db($banco);
// mysql_query('SET character_set_connection=utf8');
// mysql_query('SET character_set_client=utf8');
// mysql_query('SET character_set_results=utf8');
// 

// $dataLimite = '2019-xx-xx 23:59:59'; // ultimo dia para inscricao
// $dataAgora = date('Y-m-d H:i:s') // data atual 

$nome           = $mysqli->real_escape_string($_POST['nome']);

$remover        = array(".","-");
$cpf            = str_replace($remover,"",$_POST['cpf']);

$rg             = $mysqli->real_escape_string($_POST['rg']);
$oe             = $_POST['oe'];
$oeuf           = $_POST['oeuf'];
$nascimento     = $_POST['nascimento'];
$estado_civil   = $_POST['estado_civil'];
$sexo           = $_POST['sexo'];
$endereco       = $_POST['endereco'];
$numero         = $_POST['numero'];
$bairro         = $_POST['bairro'];
$cidade         = $_POST['cidade'];
$estado         = $_POST['estado'];
$nacionalidade  = $_POST['nacionalidade'];
$cep            = $_POST['cep'];
$telefone       = $_POST['telefone'];
$celular        = $_POST['celular'];
$email          = $_POST['email'];
$cargo          = $_POST['cargo'];

$ano = date('Y');
$complemento = substr($cpf, -8, 3);
$protocolo = rand(10000000, 99999999).''.$complemento.'/'.$ano.'';

$sql = "INSERT INTO seletivoeducacao2020 
                    (protocolo, nome, sexo, cpf, rg, oe, oeuf, nacionalidade, nascimento, estado_civil, telefone, celular, email, 
                    cep, endereco, numero, bairro, cidade, estado, cargo, habilitacao)
            VALUES ('$protocolo', '$nome', '$sexo', '$cpf', '$rg', '$oe', '$oeuf', '$nacionalidade', '$nascimento', '$estado_civil', 
                    '$telefone', '$celular', '$email', '$cep', '$endereco', '$numero', '$bairro', '$cidade', '$estado', 
                    '$cargo', '$habilitacao')  ";

$inserir = $mysqli->query($sql);


if($inserir) {                
        echo '<script>window.location.href = "inscricao.php?protocolo='.$protocolo.'"; </script>';
} else {
        echo '<script>alert("Ocorreu um erro ao fazer a inscricao. Tente novamente.")</script>';
        echo '<script>window.location.href = "index.php"; </script>';
}

// echo '<script>window.location.href = "index.php?pg=pg/quarto.php"; </script>';

	