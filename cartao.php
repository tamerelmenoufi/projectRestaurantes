<?php

include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");

print_r($_GET);
print_r($_SESSION);

if(!$_GET['c'] and !$_SESSION['pcCartao']){ exit(); }
else {
    $_SESSION['pcCartao'] = $_GET['c'];
    header("location:./cartao.php");
    exit();
}

echo $query = "select * from clientes where md5(codigo) = '{$_SESSION['pcCartao']}'";
$result = mysqli_query($con, $query);
if(!mysqli_num_rows($result)) exit();

$d = mysqli_fetch_object($result);

$dados = [
    'nome' => $d->nome,
    'cpf' => $d->cpf,
    'telefone' => $d->telefone,
    'endereco' => $d->endereco,
];

$comando = json_encode($dados);
?>
<style>
    .cracha{
        position:relative;
        width:350px;
        height:auto;
        border:solid 1px #ccc;
        border-radius:7px;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        font-family:'verdana';
        padding:15px;
    }
    .apoio{
        margin-top:10px;
        margin-bottom:30px;
        position:relative;
        width:80px;
        height:10px;
        border:solid 1px #a1a1a1;
        border-radius:20px;
    }
    .nome{
        margin-top:40px;
        margin-bottom:20px;
        position:relative;
        font-size:20px;
        color:#333;
        font-weight:bold;
    }
    .cpf{
        position:relative;
        font-size:15px;
        color:#333;
        font-weight:bold;
    }
    .validade{
        position:relative;
        font-size:10px;
        color:#a1a1a1;
        text-align:center;
        margin-top:20px;
    }
    img{
        /* margin-top:30px; */
    }
</style>
<div class="cracha">
    <div class="apoio"></div>
    <img src='img/prato_cheio.png' width="200" />
    <div class="nome"><?=$dados['nome']?></div>
    <img src='lib/vendor/barcode/?f=png&s=qr&d=<?=$comando?>' width="300" height="300" />
    <div class="cpf"><?=$dados['cpf']?></div>
    <div class="validade">Válido em todos os restaurantes Prato Cheio<br>Governo do Estado do Amazonas</div>
</div>