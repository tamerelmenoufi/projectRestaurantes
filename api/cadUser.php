<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST))
    $_POST = json_decode(file_get_contents('php://input'), true);

    //Inclusão dos dados para os logs dos clientes / Usuários
    $query = "REPLACE INTO clientes_logs set
                                        cpf = '{$_POST['cpf']}',
                                        titulo = '{$_POST['titulo']}',
                                        local = '{$_POST['local']}',
                                        restaurante = '{$_POST['restaurante']}',
                                        origem = '{$_POST['origem']}',
                                        data = '{$_POST['data']}'
    ";

    mysqli_query($con, $query);


    $query = "REPLACE INTO clientes set
                                        nome = '{$_POST['nome']}',
                                        cpf = '{$_POST['cpf']}',
                                        telefone = '{$_POST['telefone']}',
                                        titulo = '{$_POST['titulo']}',
                                        local = '{$_POST['local']}',
                                        restaurante = '{$_POST['restaurante']}',
                                        endereco = '{$_POST['endereco']}',
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