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
            c.nome as usuario
        from votos a
        left join restaurantes b on a.restaurante = b.codigo
        left join clientes c on a.cliente = c.cpf
        where a.voto = 'Excelente'
        order by restaurante, usuario desc
    ";
    $result = mysqli_query($con, $query);
    $Rotulos = [];
    $Quantidade = [];
    while($d = mysqli_fetch_object($result)){
?>
        <tr>
            <td><?=$d->restaurante?></td>
            <td><?=$d->usuario?></td>
            <td><?=$d->voto?></td>
        </tr>
<?php
    }
?>
    </tbody>
</table>

<script>
    $(function(){

        const H = $('div[<?=$_POST['local']?>="votos_excelente_unidade"]').css("height");
        alert(H);

    })
</script>