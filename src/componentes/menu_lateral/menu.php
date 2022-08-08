<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");
?>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <img src="img/logo_h.png" style="height:60px;" alt="Prato Cheio - Governo do Amazonas">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <h5>Prato Cheio - Governo do Estado do Amazonas</h5>

    <div class="row mb-1">
      <div class="col">
        <a url="src/home/dashboard/index.php" href="#" class="text-decoration-none" data-bs-dismiss="offcanvas" aria-label="Close">
          <i class="fa-solid fa-chart-pie"></i> Dashboard
        </a>
      </div>
    </div>

    <div class="row mb-1">
      <div class="col">
        <a url="src/usuarios/index.php" href="#" class="text-decoration-none" data-bs-dismiss="offcanvas" aria-label="Close">
          <i class="fa-solid fa-users"></i> Usuários
        </a>
      </div>
    </div>

    <div class="row mb-1">
      <div class="col">
        <a url="src/gestores/index.php" href="#" class="text-decoration-none" data-bs-dismiss="offcanvas" aria-label="Close">
          <i class="fa-solid fa-user-gear"></i> Gestores
        </a>
      </div>
    </div>

    <div class="row mb-1">
      <div class="col">
        <a href="./form.php" target='_blank' class="text-decoration-none">
          <i class="fa-solid fa-rectangle-list"></i> Formulário (Pré-Cadastro)
        </a>
      </div>
    </div>

    <div class="row mb-1">
      <div class="col">
        <a url="src/app/index.php" href="#" class="text-decoration-none" data-bs-dismiss="offcanvas" aria-label="Close">
         <i class="fa-solid fa-mobile-screen-button"></i> Baixar Aplicativo - Proto Cheio
        </a>
      </div>
    </div>

  </div>
</div>

<script>
  $(function(){
    $("a[url]").click(function(){
      Carregando();
      url = $(this).attr("url");
      $.ajax({
        url,
        success:function(dados){
          $("#paginaHome").html(dados);
        }
      });
    });
  })
</script>