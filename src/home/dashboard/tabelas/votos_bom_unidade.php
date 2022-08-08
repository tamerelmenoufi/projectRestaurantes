<?php
include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
$md5 = md5($_POST['rotulo'].$md5);
$data = (($_SESSION['busca_data'])?:date("Y-m-d"));

?>
<style>
    .bom{
        color:rgb(255, 159, 64, 0.2);
        border:solid 1px rgb(255, 159, 64, 1);
        border-radius:100%;
        font-size:30px;
        font-weight:bold;
    }
</style>
<table class="table table-hover">

    <tbody>
        <tr>
            <th>Unidade</th>
            <th>Usuário</th>
            <th>Voto</th>
        </tr>
<?php

    $query = "
        select
            a.*,
            concat(b.titulo,' - ',b.local) as restaurante,
            c.nome as usuario
        from votos a
        left join restaurantes b on a.restaurante = b.codigo
        left join clientes c on a.cliente = c.cpf
        where a.voto = 'Bom' and a.data LIKE '$data%'
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
                <i class="fa-regular fa-face-meh bom"></i>
            </td>
        </tr>
<?php
    }
?>
    </tbody>
</table>
<?php
    if($_GET['print']) exit;
?>
<script>
    $(function(){

        const H = $('div[grafico="<?=$_POST['local']?>"]').height();
        $('div[tabela="<?=$_POST['local']?>"]').height(H);

    })
</script>