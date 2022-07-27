<?php
    session_start();
    include("/appinc/connect.php");
    $con = AppConnect('prato_cheio');
    $md5 = md5(date("YmdHis"));