<?php
    include 'config/security.php';

    spl_autoload_register('Autoload');
    function Autoload($classname){
        $path = "config/";
        $extension = ".config.php";
        $fullpath = $path.$classname.$extension;
        
        if(!file_exists($fullpath)){
            return false;
        }
        
        include_once $fullpath;
    }
?>