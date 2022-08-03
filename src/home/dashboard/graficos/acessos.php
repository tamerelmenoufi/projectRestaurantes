<?php
include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
$md5 = md5($_POST['rotulo'].$md5);
?>

<canvas id="Tipos<?= $md5 ?>" width="400" height="400"></canvas>

<script>


<?php

    $query = "
        SELECT *, count(*) as quantidade FROM `clientes_logs` group by origem;
    ";
    $result = mysqli_query($con, $query);
    $Rotulos = [];
    $Quantidade = [];
    while($d = mysqli_fetch_object($result)){
      $Rotulos[] = strtoupper($d->origem);
      $Quantidade[] = $d->quantidade;
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
                        'rgb(75, 192, 192, 0,2)',
                        'rgb(153, 102, 255, 0,2)',
                    ],
                    borderColor: [
                        'rgb(75, 192, 192, 1)',
                        'rgb(153, 102, 255, 1)',
                    ],
                    borderWidth: 1,
                    rotulos: [<?=$R?>]
                }]
            }
        }
    );



</script>