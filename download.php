<?php

    $dir = opendir("src/home/dashboard/csv/");
    while($v = readdir($dir)){
        if($v != '.' && $v != '..'){
            $Files[] = $v;
        }
    }

    $file = $_GET['f'].".php";

    if(in_array($file,$Files)) {
        include("src/home/dashboard/csv/{$file}");
    }