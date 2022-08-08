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

    <style>
        .Topo{
            position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100px;
            background-image:url("img/topo_gov.png");
            background-position:center center;
            background-size:100% auto;
            background-repeat:no-repeat;
        }
        .Rodape{
            position:fixed;
            bottom:0;
            left:0;
            width:100%;
            height:60px;
            background-image:url("img/topo_gov.png");
            background-position:center center;
            background-size:100% auto;
            background-repeat:no-repeat;
        }
    </style>

  </head>
  <body>
    <div class="Topo"></div>
    <div class="CorpoApp"></div>
    <div class="Rodape"></div>
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