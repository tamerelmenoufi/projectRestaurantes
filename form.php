<style>
    .form{
        position:relative;
        float:left;
        width:50%;
        border:solid 1px #ccc;
        font-family:'verdana';
        padding:15px;
    }
    .nome{
        position:relative;
        float:left;
        width:100%;
        border-bottom:1px #333 solid;
    }
    .cpf{
        position:relative;
        float:left;
        width:50%;
        border-bottom:1px #333 solid;
    }
    .telefone{
        position:relative;
        float:left;
        width:50%;
        border-bottom:1px #333 solid;
    }
    .endereco:{
        position:relative;
        float:left;
        width:100%;
        border-bottom:1px #333 solid;
    }
    .endereco div[rua]{
        position:relative;
        float:left;
        width:100%;
        border-bottom:1px #333 solid;
    }
    .endereco div[casa]{
        position:relative;
        float:left;
        width:20%;
        border-bottom:1px #333 solid;
    }
    .endereco div[complemento]{
        position:relative;
        float:left;
        width:80%;
        border-bottom:1px #333 solid;
    }
    .endereco div[cep]{
        position:relative;
        float:left;
        width:30%;
        border-bottom:1px #333 solid;
    }
    .endereco div[municipio]{
        position:relative;
        float:left;
        width:70%;
        border-bottom:1px #333 solid;
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
        <span>Endereço:</span>
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