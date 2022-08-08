<?php
include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
$md5 = md5($_POST['rotulo'].$md5);
$data = (($_SESSION['busca_data'])?:date("Y-m-d"));

?>
<div style="width:100%; text-align:right">
Baixar planilha em formato CSV - Cadastro de Usuários <a href="./download.php?f=clientes_cadastrados" target="clientes_cadastrados" class="btn btn-warning">Baixar</a>
</div>
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Local</th>
        <th scope="col">Data</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $query = "select * from clientes where data LIKE '$data%' order by codigo desc";
        $result = mysqli_query($con, $query);
        while($d = mysqli_fetch_object($result)){
    ?>
    <tr>
        <td><?=$d->nome?></td>
        <td><?=$d->cpf?></td>
        <td><?=$d->local?></td>
        <td><?=dataBr($d->data)?></td>
    </tr>
    <?php
        }
    ?>
    </tbody>
</table>