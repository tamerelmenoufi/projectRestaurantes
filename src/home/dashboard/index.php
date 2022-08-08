<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");

    if($_POST['busca_data']){
      $_SESSION['busca_data'] = $_POST['busca_data'];
    }
    $data = (($_SESSION['busca_data'])?:date("Y-m-d"));
?>

<style>
  div[tabela]{
    overflow:auto;
  }
</style>
<div class="col">
  <div class="m-3">

    <h4>Relatórios e estatísticas</h4>

  <div class="row" style="margin-top:20px; margin-bottom:20px;">
    <div class="col-3">
      <input type="date" class="form-control" alterar_data value="<?=$_SESSION['busca_data']?>" />
    </div>
    <div class="col-8">Selecione a data para redefinir o relatório</div>
    <div class="col-1">
      <a class="btn btn-primary" href='./print.php?opc=g' target='g'>Imprimir</a>
    </div>
  </div>

  <!-- Pesquisa de satisfação Gráficos -->
    <div class="row" style="margin-top:20px; margin-bottom:20px;">

      <div class="col-md-3">
        <div class="card">
          <h5 class="card-header">Registro de Cadastros</h5>
          <div class="card-body">
            <div grafico="tipo_cadastros"></div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <h5 class="card-header">Impressão de Cartões</h5>
          <div class="card-body">
            <div grafico="impressao_cartoes"></div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <h5 class="card-header">Registro de Votos</h5>
          <div class="card-body">
          <div grafico="tipo_votos"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <h5 class="card-header">Registro de Acessos</h5>
          <div class="card-body">
            <div grafico="acessos"></div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col">
        <div style="width:100%; text-align:right">
          Baixar planilha em formato CSV - Votação da pesquisa <a href="./download.php?f=votos_unidade" target="votos_unidade" class="btn btn-warning">Baixar</a>
        </div>
      </div>
    </div>

    <!-- Pesquisa de satisfação Gráficos -->
    <div class="row" style="margin-top:20px; margin-bottom:20px;">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Excelente - por Unidade</h5>
          <div class="card-body">
            <div grafico="votos_excelente_unidade"></div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Tabela Excelente - por Unidade</h5>
          <div class="card-body">
            <div tabela="votos_excelente_unidade"></div>
          </div>
        </div>
      </div>
    </div>



    <!-- Pesquisa de satisfação Gráficos -->
    <div class="row" style="margin-top:20px; margin-bottom:20px;">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Bom - por Unidade</h5>
          <div class="card-body">
            <div grafico="votos_bom_unidade"></div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Tabela Bom - por Unidade</h5>
          <div class="card-body">
            <div tabela="votos_bom_unidade"></div>
          </div>
        </div>
      </div>
    </div>


    <!-- Pesquisa de satisfação Gráficos -->
    <div class="row" style="margin-top:20px; margin-bottom:20px;">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Ruim - por Unidade</h5>
          <div class="card-body">
            <div grafico="votos_ruim_unidade"></div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Tabela Ruim - por Unidade</h5>
          <div class="card-body">
            <div tabela="votos_ruim_unidade"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="card">
          <h5 class="card-header">Clientes Cadastrados</h5>
          <div class="card-body">
            <div style="width:100%; text-align:right">
              Baixar planilha em formato CSV - Cadastro de Usuários <a href="./download.php?f=clientes_cadastrados" target="clientes_cadastrados" class="btn btn-warning">Baixar</a>
            </div>
            <div tabela="clientes_cadastrados"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="margin-top:20px;">
      <div class="col">
        <div class="card">
          <h5 class="card-header">Pesquisa de Satisfação</h5>
          <div class="card-body">
            <div style="width:100%; text-align:right">
                Baixar planilha em formato CSV - Pesquisa de satisfacao <a href="./download.php?f=pesquisa_satisfacao" target="pesquisa_satisfacao" class="btn btn-warning">Baixar</a>
            </div>
            <div tabela="pesquisa_satisfacao"></div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>







<script>
  $(function(){
    Carregando('none');

    const Graficos = (r) => {
        $.ajax({
          url:`src/home/dashboard/graficos/${r.local}.php`,
          type:"POST",
          data:{
            rotulo:r.rotulo,
            local:r.local,
          },
          success:function(dados){
            $(`div[grafico="${r.local}"]`).html(dados);
          },
          error:function(){
            console.log('Erro');
          }
        });
    }

    $("div[grafico]").each(function(){
      local = $(this).attr("grafico");
      rotulo = $(this).parent('div').parent('div').children('h5').text();
      Graficos({local, rotulo});
    })



    const Tabelas = (r) => {
        $.ajax({
          url:`src/home/dashboard/tabelas/${r.local}.php`,
          type:"POST",
          data:{
            rotulo:r.rotulo,
            local:r.local,
          },
          success:function(dados){
            $(`div[tabela="${r.local}"]`).html(dados);
          },
          error:function(){
            console.log('Erro');
          }
        });
    }

    $("div[tabela]").each(function(){
      local = $(this).attr("tabela");
      rotulo = $(this).parent('div').parent('div').children('h5').text();
      Tabelas({local, rotulo});
    })

    $("input[alterar_data]").change(function(){
      Carregando();
      busca_data = $(this).val();
      $.ajax({
        url:"src/home/dashboard/index.php",
        type:"POST",
        data:{
          busca_data
        },
        success:function(dados){
          $("#paginaHome").html(dados);
        }
      });
    });

  })
</script>