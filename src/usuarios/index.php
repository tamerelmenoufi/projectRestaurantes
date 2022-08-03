<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");

    if($_POST['delete']){
        $query = "delete from clientes where codigo = '{$_POST['delete']}'";
        mysqli_query($con, $query);

    }

?>

<div class="col">
  <div class="m-3">

    <h4>Título da página</h4>

    <div class="row">
      <div class="col">
        <div class="card">
          <h5 class="card-header">Lista de Usuários</h5>
          <div class="card-body">
            <div style="display:flex; justify-content:end">
                <button
                    novoCadastro
                    class="btn btn-primary"
                    data-bs-toggle="offcanvas"
                    href="#offcanvasDireita"
                    role="button"
                    aria-controls="offcanvasDireita"
                >Novo</button>
            </div>


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
                    <?php
                    if(!$d->local){
                    ?>
                    <button class="btn btn-danger" delete="<?=$d->codigo?>">
                      Excluir
                    </button>
                    <?php
                    }
                    ?>
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
        $("button[novoCadastro]").click(function(){
            $.ajax({
                url:"src/usuarios/form.php",
                success:function(dados){
                    $(".LateralDireita").html(dados);
                }
            })
        })

        $("button[delete]").click(function(){
            deletar = $(this).attr("delete");
            $.ajax({
                url:"src/usuarios/form.php",
                type:"POST",
                data:{
                    delete:deletar
                },
                success:function(dados){
                    $("#paginaHome").html(dados);
                }
            })
        })

    })
</script>