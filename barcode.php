<?php
$comando = '{"nome":"FULANO DE SILVA E COSTA","cpf":"123.456.789-10","telefone":"(92) 99999-8888","endereco":"Rua principal, 11, Edifício Azul, Apto 1504, CEP 69000-000, Manaus,  Amazonas"}';
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
    <div class="nome">FULANO DE SILVA E COSTA</div>
    <img src='lib/vendor/barcode/?f=png&s=qr&d=<?=$comando?>' width="300" height="300" />
    <div class="cpf">123.456.789-10</div>
    <div class="validade">Válido em todos os restaurantes Prato Cheio<br>Governo do Estado do Amazonas</div>
</div>