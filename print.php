<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/app/projectRestaurantes/lib/includes.php");


    if($_GET['opc']){
        $url = "src/print/geral.php";
    }else{
        exit();
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="img/icone.png">
    <title>Prato Cheio - Governo do Estado Amazonas</title>
    <?php
    include("lib/header.php");
    ?>
  </head>
  <body>

    <div class="CorpoApp"></div>

    <?php
    include("lib/footer.php");
    ?>

    <script>
        $(function(){

            $.ajax({
                url:"<?=$url?>",
                success:function(dados){
                    $(".CorpoApp").html(dados);
                }
            });
        })
    </script>

  </body>
</html>