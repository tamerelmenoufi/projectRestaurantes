<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST))
    $_POST = json_decode(file_get_contents('php://input'), true);


    $query = "REPLACE INTO votos set
                                        restaurante = '{$_POST['restaurante']}',
                                        cliente = '{$_POST['usuario']}',
                                        voto = '{$_POST['voto']}',
                                        data = '{$_POST['data']}'
    ";
    if(mysqli_query($con, $query)){
        $retotno = [
            'status' => true,
            'message' => 'Tudo certo'
        ];
    }else{
        $retotno = [
            'status' => false,
            'message' => 'Deu Erro'
        ];
    }


    echo json_encode($retotno);

    // file_put_contents('dados.txt', print_r($_POST, true));