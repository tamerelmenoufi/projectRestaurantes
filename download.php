<?php
    $dir = opendir("src/home/dashboard/csv/");
    while($v = readdir($dir)){
        if($v != '.' && $v != '..'){
            $Files[] = $v;
        }
    }
    $file = $_GET['f'].".php";
    if(in_array($file,$Files)) {
        session_start();
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; '.$_GET['f'].'-'.$_SESSION['busca_data'].'.csv');
        header('Pragma: no-cache');


        include("src/home/dashboard/csv/{$file}");
    }