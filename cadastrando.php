<?php
      $host = "mysql.hostinger.com.br";
      $user = "u652146223_dfpms";
      $pass = "semed2017";
      $banco = "u652146223_cadas";
      error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED); 
      $conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
      mysql_select_db($banco)
      ?>


<?php
   
   header('Content-Type: text/html; charset=utf-8');
   mysql_connect($host,$user,$pass);
   mysql_select_db($banco);
   mysql_query('SET character_set_connection=utf8');
   mysql_query('SET character_set_client=utf8');
   mysql_query('SET character_set_results=utf8');
   
    //define o limite de inscricoes para o processo seletivo
    $limite = 15;
    //define a data limite de inscricoes para o processo seletivo
    $dataLimite = '2019-12-23 23:59:59';


                
    $nome           = $_POST['nome'];
    $cpf            = unmaskCpf($_POST['cpf']);
    $rg             = $_POST['rg'];
    $oe             = $_POST['oe'];
    // $uf             = $_POST['uf'];
    $nascimento     = $_POST['nascimento'];
    $estado_civil   = $_POST['estado_civil'];
    $sexo           = $_POST['sexo'];
    $endereco       = $_POST['endereco'];
    $numero         = $_POST['numero'];
    $bairro         = $_POST['bairro'];
    $cidade         = $_POST['cidade'];
    $estado         = $_POST['estado'];
    $nacionalidade    = $_POST['nacionalidade'];
    $cep            = $_POST['cep'];
    $telefone       = $_POST['telefone'];
    $celular        = $_POST['celular'];
    $email          = $_POST['email'];
    $cargo          = $_POST['cargo'];

    if(!$nome){
        $json['status'] = false;
        $json['msg']    = 'Um nome é obrigatório!';  
        echo json_encode($json);
        exit;
    }

    if(!$cpf){
        $json['status'] = false;
        $json['msg']    = 'Um CPF é obrigatório!';  
        echo json_encode($json);
        exit;
    }

   if(!$rg){
        $json['status'] = false;
        $json['msg']    = 'Um rg é obrigatório!';  
        echo json_encode($json);
        exit;
    }
    
    if(!$oe){
        $json['status'] = false;
        $json['msg']    = 'Um Orgão Expedidor é obrigatório!';  
        echo json_encode($json);
        exit;
    }

    /*if(!$uf){
        $json['status'] = false;
        $json['msg']    = 'Uma Unidade Federativa é obrigatória!';  
        echo json_encode($json);
        exit;
    }*/

    if(!$nascimento){
        $json['status'] = false;
        $json['msg']    = 'Uma data de Nascimento é obrigatória!';  
        echo json_encode($json);
        exit;
    }

    if(!$cep){
        $json['status'] = false;
        $json['msg']    = 'Um CEP é obrigatório!';  
        echo json_encode($json);
        exit;
    }

    if(!$telefone){
        $json['status'] = false;
        $json['msg']    = 'Um telefone é obrigatório!';  
        echo json_encode($json);
        exit;
    }

    if(!$email){
        $json['status'] = false;
        $json['msg']    = 'Um email é obrigatório!';  
        echo json_encode($json);
        exit;
    }

    if(!$cargo){
        $json['status'] = false;
        $json['msg']    = 'Um cargo é obrigatório!';  
        echo json_encode($json);
        exit;
    }

    $cpf = $_REQUEST['cpf'];
    $sql = mysql_query("SELECT * FROM seletivo2020 WHERE cpf = '$cpf'");
            $json['status'] = false;
        $json['msg']    = mysql_num_rows($sql);  
        echo json_encode($json);
        exit;
    if(mysql_num_rows($sql) > 0){
        $json['status'] = false;
        $json['msg']    = 'Este CPF ja está cadastrado!';  
        echo json_encode($json);
        exit;
    }

    //obtem a quantidade de inscricoes realizadas
    $inscricoes = mysql_result(mysql_query("SELECT COUNT(*) FROM seletivo2020"), 0);

    //checa se o numero de inscricoes atingiu o limite
    if (($inscricoes >= $limite)) {
        $json['status'] = false;
        $json['msg'] = 'Lamentamos, o número de inscrições atingiu o limite.';
        
        echo json_encode($json);
        exit;
    }
    
    $dataAtual = date('Y-m-d H:i:s');
    $atingiuDataLimite = strtotime($dataAtual) > strtotime($dataLimite);
    
    if ($atingiuDataLimite) {
        $json['status'] = false;
        $json['msg'] = 'Lamentamos, as inscrições foram encerradas.';
        
        echo json_encode($json);
        exit;
    }

    $sql = mysql_query("INSERT INTO seletivo2020(nome, cpf, rg, oe, nascimento, estado_civil, sexo, endereco, numero, bairro, cidade, estado, nacionalidade, cep, telefone, celular, email, cargo)
    VALUES ('$nome', '$cpf', '$rg', '$oe', '$nascimento', '$estado_civil', '$sexo', '$endereco', '$numero', '$bairro', '$cidade', '$estado', '$nacionalidade', '$cep', '$telefone', '$celular', '$email', '$cargo')")or die (mysql_error());
    $row = mysql_affected_rows();
    $id = mysql_insert_id();
    $recibo = rand(10000000, 99999999).'-'.$id;
    mysql_query("UPDATE seletivo2020 SET recibo = $recibo WHERE id = $id");
    
    if($row > 0){
        $json['status'] = true;
        $json['msg']    = 'Inscricao realizada com sucesso!';
        $json['recibo'] = $recibo;
    }else{
        $json['status'] = false;
        $json['msg']    = 'Ocorreu um erro na inscrição!';  
    }

    echo json_encode($json);

    function unmaskCpf($cpf = null){
        if($cpf){
            return str_replace('-', '', str_replace('.', '', str_replace('.', '', str_replace('.', '', $cpf))));
        }
    }            
?>	