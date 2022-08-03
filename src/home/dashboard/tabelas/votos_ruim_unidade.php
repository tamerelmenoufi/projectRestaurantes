<?php
include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
$md5 = md5($_POST['rotulo'].$md5);
?>
<style>
    .ruim{
        color:rgb(255, 99, 132, 0.2);
        border:solid 1px rgb(255, 99, 132, 1);
        font-size:30px;
        font-weight:bold;
    }
</style>
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
        where a.voto = 'Ruim'
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
            <td>
                <i class="fa-regular fa-face-frown ruim"></i>
            </td>
        </tr>
<?php
    }
?>
    </tbody>
</table>

<script>
    $(function(){

        const H = $('div[grafico="<?=$_POST['local']?>"]').height();
        $('div[tabela="<?=$_POST['local']?>"]').height(H);

    })
</script>