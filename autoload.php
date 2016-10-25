<?php
/**
 * 自动载入
 *
 * @author Flc <2016-10-25 17:35:52>
 * @link http://flc.ren 
 */
spl_autoload_register(function ($classname) {
    $baseDir = __DIR__  . '/src/Alidayu/';

    if (strpos($classname, "Flc\\Alidayu\\") === 0) {
        $file = $baseDir . substr($classname, strlen('Flc\\Alidayu\\')) . '.php';

        if (is_file($file))
            require_once $file;
    }
});