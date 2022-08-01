<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
?>
<div class="col">
  <div class="m-3">

    <h4>Título da página</h4>

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
                  <th scope="col">Cartão</th>
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
                  <td>
                    <button class="btn btn-primary" cartao="<?=$d->codigo?>">
                      Cartão
                    </button>
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