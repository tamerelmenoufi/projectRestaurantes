<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
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
      <input type="date" class="form-control" alterar_data />
    </div>
    <div class="col-8">Selecione a data para redefinir o relatório</div>
    <div class="col-1">
      <a class="btn btn-primary" href='./print.php?opc=g' target='g'>Imprimir</a>
    </div>
  </div>

  <!-- Pesquisa de satisfação Gráficos -->
    <div class="row" style="margin-top:20px; margin-bottom:20px;">

      <div class="col-md-4">
        <div class="card">
          <h5 class="card-header">Registro de Cadastros</h5>
          <div class="card-body">
            <div grafico="tipo_cadastros"></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <h5 class="card-header">Registro de Votos</h5>
          <div class="card-body">
          <div grafico="tipo_votos"></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <h5 class="card-header">Registro de Acessos</h5>
          <div class="card-body">
            <div grafico="acessos"></div>
          </div>
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
                  $query = "select * from clientes order by codigo desc";
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
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="margin-top:20px;">
      <div class="col">
        <div class="card">
          <h5 class="card-header">Pesquisa de Satisfação</h5>
          <div class="card-body">

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">CPF</th>
                  <th scope="col">Restaurante</th>
                  <th scope="col">Data</th>
                  <th scope="col">Voto</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "select a.*, concat(b.local,' - ',b.titulo) as restaurante from votos a left join restaurantes b on a.restaurante = b.codigo order by a.codigo desc";
                  $result = mysqli_query($con, $query);
                  while($d = mysqli_fetch_object($result)){
                ?>
                <tr>
                  <td><?=$d->cliente?></td>
                  <td><?=$d->restaurante?></td>
                  <td><?=$d->data?></td>
                  <td>
                    <i class="fa-regular fa-face-frown" style="color:<?=(($d->voto == 'Ruim')?'red':'#ccc')?>"></i>
                    <i class="fa-regular fa-face-meh" style="color:<?=(($d->voto == 'Bom')?'orange':'#ccc')?>"></i>
                    <i class="fa-regular fa-face-smile" style="color:<?=(($d->voto == 'Excelente')?'green':'#ccc')?>"></i>
                  </td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
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
      $.ajax({
        url:"src/home/dashboard/index.php",
        success:function(dados){
          $("#paginaHome").html(dados);
        }
      });
    });

  })
</script>