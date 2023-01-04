<?php
    session_start();
    include("/appinc/cBarb.php");
    include("/appinc/connect.php");
    $con = AppConnect('prato_cheio');
    include("fn.php");
    $md5 = md5(date("YmdHis"));