<?php
include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
$md5 = md5($_POST['rotulo'].$md5);
$data = (($_SESSION['busca_data'])?:date("Y-m-d"));

?>

<canvas id="Tipos<?= $md5 ?>" width="400" height="400"></canvas>

<script>


<?php

    $query = "
        select
            a.*,
            concat(b.titulo,' - ',b.local) as restaurante,
            count(*) as qt
        from votos a
        left join restaurantes b on a.restaurante = b.codigo
        where a.voto = 'Ruim' and a.data LIKE '$data%'
        group by a.restaurante
        order by qt desc
    ";
    $result = mysqli_query($con, $query);
    $Rotulos = [];
    $Quantidade = [];
    while($d = mysqli_fetch_object($result)){
      $Rotulos[] = $d->restaurante;
      $Quantidade[] = $d->qt;
    }
    $R = (($Rotulos)?"'".implode("','",$Rotulos)."'":0);
    $Q = (($Quantidade)?implode(",",$Quantidade):0);

?>

    const TiposCtx<?=$md5?> = document.getElementById('Tipos<?=$md5?>');

    const Tipos<?=$md5?> = new Chart(TiposCtx<?=$md5?>,
        {
            type: 'bar',
            data: {
                labels: [<?=$R?>],
                datasets: [
                    {
                        label: [<?=$R?>],
                        data: [<?=$Q?>],
                        backgroundColor: 'rgb(255, 99, 132, 0.2)',
                        // [
                        //     'rgba(255, 99, 132, 0.2)',
                        //     // 'rgba(54, 162, 235, 0.2)',
                        //     // 'rgba(255, 206, 86, 0.2)',
                        // ],
                        borderColor: 'rgb(255, 99, 132, 1)',
                        // [
                        //     'rgba(255, 99, 132, 1)',
                        //     // 'rgba(54, 162, 235, 1)',
                        //     // 'rgba(255, 206, 86, 1)',
                        // ],
                        borderWidth: 1,
                        rotulos: [<?=$R?>]
                    }
            ]
            },
            options: {
                indexAxis: 'y',
                elements: {
                    bar: {
                        borderWidth: 2,
                    }
                },
                responsive: true,
                plugins: {
                    legend: false/*{
        position: 'right',
      }*/,
                    title: {
                        display: false,
                        text: 'Pesquisa de satisfação'
                    },


                    tooltip: {
                        callbacks: {
                            title: function (context) {
                                indx = context[0].parsed.y;
                                return context[0].dataset.rotulos[indx];
                            },
                            label: function (context) {
                                indx = context.parsed.y;
                                var label = ' ' + context.dataset.label[indx] || '';

                                if (label) {
                                    label += ' : ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.x + ' Registro(s)';
                                }
                                return label;
                            }
                        }
                    }

                }
            },
        }
    );



</script>