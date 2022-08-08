<?php
include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
$md5 = md5($_POST['rotulo'].$md5);
$data = (($_SESSION['busca_data'])?:date("Y-m-d"));

?>
Nome;CPF;Local;Data
    <?php
        $query = "select * from clientes where data LIKE '$data%' order by codigo desc";
        $result = mysqli_query($con, $query);
        while($d = mysqli_fetch_object($result)){
    ?>
    <?=$d->nome?>;<?=$d->cpf?>;<?=$d->local?>;<?=dataBr($d->data)."\n"?>
    <?php
        }
    ?>