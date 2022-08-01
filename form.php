<style>
    .form{
        position:relative;
        float:left;
        width:50%;
        border:solid 1px #ccc;
        font-family:'verdana';
        padding:15px;
    }
    .titulo{
        font-weight:bold;
        text-align:center;
        margin-bottom:10px;
    }
    .nome{
        position:relative;
        height:40px;
        float:left;
        width:calc(100% - 10px);
        border-bottom:1px #333 solid;
        padding:5px;
        margin-top:5px;
    }
    .cpf{
        position:relative;
        height:40px;
        float:left;
        width:calc(50% - 10px);
        border-bottom:1px #333 solid;
        padding:5px;
        margin-top:5px;
    }
    .telefone{
        position:relative;
        height:40px;
        float:left;
        width:calc(50% - 10px);
        border-bottom:1px #333 solid;
        padding:5px;
        margin-top:5px;
    }
    .endereco:{
        position:relative;
        height:auto;
        float:left;
        width:calc(100% - 10px);
        border-bottom:1px #333 solid;
        padding:5px;
    }
    .endereco div[rua]{
        position:relative;
        height:40px;
        float:left;
        width:100%;
        border-bottom:1px #333 solid;
        margin-top:5px;
    }
    .endereco div[casa]{
        position:relative;
        height:40px;
        float:left;
        width:20%;
        border-bottom:1px #333 solid;
        margin-top:5px;
    }
    .endereco div[complemento]{
        position:relative;
        height:40px;
        float:left;
        width:80%;
        border-bottom:1px #333 solid;
        margin-top:5px;
    }
    .endereco div[cep]{
        position:relative;
        height:40px;
        float:left;
        width:30%;
        border-bottom:1px #333 solid;
        margin-top:5px;
    }
    .endereco div[municipio]{
        position:relative;
        height:40px;
        float:left;
        width:70%;
        border-bottom:1px #333 solid;
        margin-top:5px;
    }
    span{
        font-size:10px;
        color:#333;
        font-weight:bold;
        padding-bottom:30px;
    }
    img{
        position:absolute;
        z-index: 0;
        bottom:0;
        right:0;
        opacity:0.2;
    }
</style>
<div class="form">
    <img src='img/prato_cheio.png' width="200" />
    <div class="titulo">FICHA DE CADASTRO - Prato Cheio</div>
    <div class="nome">
        <span>Nome Completo:</span>
    </div>
    <div class="cpf">
        <span>CPF:</span>
    </div>
    <div class="telefone">
        <span>Telefone:</span>
    </div>
    <div class="endereco">
        <div rua>
            <span>Rua:</span>
        </div>
        <div casa>
            <span>Casa:</span>
        </div>
        <div complemento>
            <span>Complemento:</span>
        </div>
        <div cep>
            <span>CEP:</span>
        </div>
        <div municipio>
            <span>Município:</span>
        </div>
    </div>
</div>