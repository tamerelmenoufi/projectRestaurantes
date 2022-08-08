<?php

    $dir = opendir("src/home/dashboard/csv/");
    while($v = readdir($dir)){
        if($v != '.' && $v != '..'){
            $Files[] = $v;
        }
    }

    if(in_array($_GET['f'],$Files)) {
        echo "TEM!";
        include("src/home/dashboard/csv/{$_GET['f']}");
    }