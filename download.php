<?php

    $dir = opendir("src/home/dashboard/csv/");
    foreach(readdir($dir) as $i => $v){
        if($v != '.' && $v != '..'){
            $Files[] = $v;
        }
    }

    implode(", ",$Files);

    if($_GET) include("src/home/dashboard/csv/{$_GET['f']}");