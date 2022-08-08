<?php
include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
$md5 = md5($_POST['rotulo'].$md5);
$data = (($_SESSION['busca_data'])?:date("Y-m-d"));
?>Unidade;Usuário;Voto<?="\n"?><?php

    $query = "
        select
            a.*,
            concat(b.titulo,' - ',b.local) as restaurante,
            c.nome as usuario
        from votos a
        left join restaurantes b on a.restaurante = b.codigo
        left join clientes c on a.cliente = c.cpf
        where a.data LIKE '$data%'
        order by restaurante, usuario desc
    ";
    $result = mysqli_query($con, $query);
    $Rotulos = [];
    $Quantidade = [];
    while($d = mysqli_fetch_object($result)){
?><?=$d->restaurante?>;<?=$d->usuario?>;<?=$d->voto."\n"?><?php
    }
?>