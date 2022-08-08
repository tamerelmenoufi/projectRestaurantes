<?php
include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
$md5 = md5($_POST['rotulo'].$md5);
$data = (($_SESSION['busca_data'])?:date("Y-m-d"));

?>

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">CPF</th>
        <th scope="col">Restaurante</th>
        <th scope="col">Data</th>
        <th scope="col">Voto</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $query = "select a.*, concat(b.local,' - ',b.titulo) as restaurante from votos a left join restaurantes b on a.restaurante = b.codigo where a.data LIKE '$data%' order by a.codigo desc";
        $result = mysqli_query($con, $query);
        while($d = mysqli_fetch_object($result)){
    ?>
    <tr>
        <td><?=$d->cliente?></td>
        <td><?=$d->restaurante?></td>
        <td><?=$d->data?></td>
        <td>
        <i class="fa-regular fa-face-frown" style="color:<?=(($d->voto == 'Ruim')?'red':'#ccc')?>"></i>
        <i class="fa-regular fa-face-meh" style="color:<?=(($d->voto == 'Bom')?'orange':'#ccc')?>"></i>
        <i class="fa-regular fa-face-smile" style="color:<?=(($d->voto == 'Excelente')?'green':'#ccc')?>"></i>
        </td>
    </tr>
    <?php
        }
    ?>
    </tbody>
</table>