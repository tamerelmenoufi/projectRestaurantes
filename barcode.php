<?php

$comando = '{"nome":"Tamer Mohamed Elmenoufi","cpf":"601.109.702-25","telefone":"(92) 99188-6570","endereco":"Rua Monsenhor Coutinho, 600, Edifício Maximino Correia, Apto 1302, CEP 69010-110, Manaus,  Amazonas"}';

?>

<img src='lib/vendor/barcode/?f=png&s=qr&d=<?=$comando?>' width="300" height="300" />