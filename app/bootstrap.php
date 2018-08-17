<?php
    //DB Param
    define('DB_HOST', 'localhost');
    define('DB_USER', '_YOUR_DB_USER_');
    define('DB_PASS', '_YOUR_DB_PWD_');
    define('DB_NAME', '_YOUR_DB_NAME_');

    //Load config file 
    require_once 'config/config.php';
    //Load libraries & also auto loading files.
/*    require_once 'libraries/core.php';
    require_once 'libraries/controller.php';
    require_once 'libraries/database.php';
*/
    //auto load function to load all the default libraries.
    spl_autoload_register(function($className){
        require_once 'libraries/' . $className . '.php';
    });
