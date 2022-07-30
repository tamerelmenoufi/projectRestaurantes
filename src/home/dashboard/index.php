<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
?>
<div class="col">
  <div class="m-3">

    <h4>Título da página</h4>

    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Clientes Cadastrados</h5>
          <div class="card-body">

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">CPF</th>
                  <th scope="col">Local</th>
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