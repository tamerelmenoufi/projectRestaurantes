<?php
include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
$md5 = md5($_POST['rotulo'].$md5);
?>




<table class="table table-hover">

    <thead>
        <tr>
            <th>Unidade</th>
            <th>Usuário</th>
            <th>Voto</th>
        </tr>
    </thead>
    <tbody>
<?php

    $query = "
        select
            a.*,
            concat(b.titulo,' - ',b.local) as restaurante,
            count(*) as qt
        from votos a
        left join restaurantes b on a.restaurante = b.codigo
        where a.voto = 'Bom'
        group by a.restaurante
        order by qt desc
    ";
    $result = mysqli_query($con, $query);
    $Rotulos = [];
    $Quantidade = [];
    while($d = mysqli_fetch_object($result)){
?>
        <tr>
            <td><?=$d->local?></td>
            <td><?=$d->nome?></td>
            <td><?=$d->voto?></td>
        </tr>
<?php
    }
?>
    </tbody>
</table>
