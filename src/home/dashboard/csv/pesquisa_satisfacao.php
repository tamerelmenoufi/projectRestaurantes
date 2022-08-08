<?php
include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
$md5 = md5($_POST['rotulo'].$md5);
$data = (($_SESSION['busca_data'])?:date("Y-m-d"));

?>
CPF;Restaurante;Data;Voto
    <?php
        $query = "select a.*, concat(b.local,' - ',b.titulo) as restaurante from votos a left join restaurantes b on a.restaurante = b.codigo where a.data LIKE '$data%' order by a.codigo desc";
        $result = mysqli_query($con, $query);
        while($d = mysqli_fetch_object($result)){
    ?>
<?=$d->cliente?>;<?=$d->restaurante?>;<?=$d->data?>;<?=$d->voto."\n"?>
<?php
        }
?>