<?php
$comando = '{"nome":"Tamer Mohamed Elmenoufi","cpf":"601.109.702-25","telefone":"(92) 99188-6570","endereco":"Rua Monsenhor Coutinho, 600, Edifício Maximino Correia, Apto 1302, CEP 69010-110, Manaus,  Amazonas"}';
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
        position:relative;
        width:40px;
        height:5px;
        border:solid 1px #a1a1a1;
        border-radius:20px;
    }
    .nome{
        position:relative;
        font-size:20px;
        color:#333;
    }
    .cpf{
        position:relative;
        font-size:15px;
        color:#333;
    }
    .validade{
        position:relative;
        font-size:10px;
        color:#a1a1a1;
    }
    img{
        margin-top:20px;
        margin-bottom:20px;
    }
</style>
<div class="cracha">
    <div class="apoio"></div>
    <img src='img/prato_cheio.png' width="150" />
    <div class="nome">TAMER MOHAMED ELMENOUFI</div>
    <img src='lib/vendor/barcode/?f=png&s=qr&d=<?=$comando?>' width="300" height="300" />
    <div class="cpf">601.109.702-25</div>
    <div class="validade">Válido em todos os restaurantes bom prato<br>Governo do Estado do Amazonas</div>
</div>