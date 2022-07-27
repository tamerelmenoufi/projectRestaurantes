<?php

    include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");


    $query = "select * from restaurantes where situacao = '1' order by titulo asc, local asc";
    $result = mysqli_query($con, $query);
    $dados = [];
    while($d = mysqli_fetch_object($result)){
        $dados[] = $d;
    }

    echo json_encode($dados);
