<?php
include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
$md5 = md5($_POST['rotulo'].$md5);

$data = (($_SESSION['busca_data'])?:date("Y-m-d"));


?>

<canvas id="Tipos<?= $md5 ?>" width="400" height="400"></canvas>

<script>


<?php

    $query = "
    SELECT
        (SELECT count(*) as app FROM `clientes` where local != '' and data LIKE '$data%') as app,
        (SELECT count(*) as app FROM `clientes` where local = '' and data LIKE '$data%') as cartao
    ";
    $result = mysqli_query($con, $query);
    $Rotulos = [];
    $Quantidade = [];
    while($d = mysqli_fetch_object($result)){
      $Rotulos = ['Com Registros', 'Sem Registros'];
      $Quantidade = [$d->app, $d->cartao];
    }
    $R = (($Rotulos)?"'".implode("','",$Rotulos)."'":0);
    $Q = (($Quantidade)?implode(",",$Quantidade):0);

?>

    const TiposCtx<?=$md5?> = document.getElementById('Tipos<?=$md5?>');

    const Tipos<?=$md5?> = new Chart(TiposCtx<?=$md5?>,
        {
            type: 'pie',
            data: {
                labels: [<?=$R?>],
                datasets: [{
                    label: [<?=$R?>],
                    data: [<?=$Q?>],
                    backgroundColor: [
                        'rgb(54, 162, 235, 0.2)',
                        'rgb(201, 203, 207, 0.2)',
                    ],
                    borderColor: [
                        'rgb(54, 162, 235, 1)',
                        'rgb(201, 203, 207, 1)',
                    ],
                    borderWidth: 1,
                    rotulos: [<?=$R?>]
                }]
            }
        }
    );



</script>