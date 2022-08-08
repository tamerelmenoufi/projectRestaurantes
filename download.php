<?php

    $dir = opendir("src/home/dashboard/csv/");
    while($v = readdir($dir)){
        if($v != '.' && $v != '..'){
            $Files[] = $v;
        }
    }

    echo $file = $_GET['f'].".php";
    echo "<hr>";
    print_r($Files);

    if(in_array($file,$Files)) {
        include("src/home/dashboard/csv/{$file}");
    }