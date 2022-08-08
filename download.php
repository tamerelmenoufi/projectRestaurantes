<?php

    $dir = opendir("src/home/dashboard/csv/");
    while($v = readdir($dir)){
        if($v != '.' && $v != '..'){
            $Files[] = $v;
        }
    }

    implode(", ",$Files);

    if($_GET) include("src/home/dashboard/csv/{$_GET['f']}");