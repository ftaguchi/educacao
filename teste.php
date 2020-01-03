<?php
$hostname_connDB = "localhost";
$database_connDB = "catupalacehotel";
$username_connDB = "root";
$password_connDB = "root";
$mysqli = new mysqli($hostname_connDB, $username_connDB, $password_connDB, $database_connDB);

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<select name='fabricante'>
    <?php
    $sql1 = "SELECT * FROM categorias_pai";
    $consulta1 = $mysqli->query($sql1);
    while ($linha1 = $consulta1->fetch_array()) {
        echo '<option value="' . $linha1['idCatPai'] . '">' . $linha1['CatPaiTitle'] . '</option>';
    }
    ?>
</select>

<select name='produtos'></select>

<div class="hidden produtos-f1">
    <?php
    $sql = "SELECT * FROM destaques";
    $consulta = $mysqli->query($sql);
    while ($linha = $consulta->fetch_array()) {
        echo '<option value="' . $linha['idDestaque'] . '">' . $linha['NomeDestaque'] . '</option>';
    }
    ?>
</div>



<script>
    $(function() {
        $('.hidden').hide(); // oculta as divs com os dados retornados do BD
        $('select[name=produtos]').html($('div.produtos-f1').html()); // define o padrão

        $('select[name=fabricante]').change(function() {
            var id = $('select[name=fabricante]').val();
            $('select[name=produtos]').empty();
            $('select[name=produtos]').html($('div.produtos-f' + id).html());
        });
    });
</script>